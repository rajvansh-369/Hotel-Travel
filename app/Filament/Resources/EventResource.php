<?php

namespace App\Filament\Resources;



use App\Filament\Resources\EventResource\Pages;
use App\Models\TimexEvents;
use Buildix\Timex\Traits\TimexTrait;
use Carbon\Carbon;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
// use App\Filament\Resources\EventResource\Pages;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Radio;
use Illuminate\Support\Collection;
use function PHPUnit\Framework\isEmpty;
// use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\Action;

class EventResource extends Resource
{
    use TimexTrait;
    protected static ?string $recordTitleAttribute = 'subject';
    protected $chosenStartTime;



    public static function getModel(): string
    {
        return config('timex.models.event');
    }

    public static function getModelLabel(): string
    {
        return trans('timex::timex.model.label');
    }

    public static function getPluralModelLabel(): string
    {
        return trans('timex::timex.model.pluralLabel');
    }

    public static function getSlug(): string
    {
        return config('timex.resources.slug');
    }

    protected static function getNavigationGroup(): ?string
    {
        return config('timex.pages.group');
    }

    protected static function getNavigationSort(): ?int
    {
        return config('timex.resources.sort',1);
    }

    protected static function getNavigationIcon(): string
    {
        return config('timex.resources.icon');
    }

    protected static function shouldRegisterNavigation(): bool
    {
        if (!config('timex.resources.shouldRegisterNavigation')){
            return false;
        }
        if (!static::canViewAny()){
            return false;
        }

        return true;
    }




    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('organizer'),
                TextInput::make('subject')
                    ->label(trans('timex::timex.event.subject'))
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('body')
                    ->label(trans('timex::timex.event.body'))
                    ->columnSpanFull(),
                Select::make('participants')
                    ->label(trans('timex::timex.event.participants'))
                    ->options(function (){
                        return self::getUserModel()::all()
                            ->pluck(self::getUserModelColumn('name'),self::getUserModelColumn('id'));
                    })
                    ->multiple()->columnSpanFull()->hidden(!in_array('participants',\Schema::getColumnListing(self::getEventTableName()))),
                Select::make('category')
                    ->label(trans('timex::timex.event.category'))
                    ->columnSpanFull()
                    ->searchable()
                    ->preload()
                    ->options(function (){
                        return self::isCategoryModelEnabled() ? self::getCategoryModel()::all()
                            ->pluck(self::getCategoryModelColumn('value'),self::getCategoryModelColumn('key'))
                            : config('timex.categories.labels');
                    })
                    ->columnSpanFull(),
                Grid::make(3)->schema([
                    Toggle::make('isAllDay')
                        ->label(trans('timex::timex.event.allDay'))
                        ->columnSpanFull()
                        ->reactive()
                        ->afterStateUpdated(function ($set, callable $get, $state){
                            $start = today()->setHours(0)->setMinutes(0);
                            $end = today()->setHours(23)->setMinutes(59);
                            if ($state == true){
                                $set('startTime',$start);
                                $set('endTime',$end);
                            }else{
                                $set('startTime',now()->setMinutes(0)->addHour());
                                $set('endTime',now()->setMinutes(0)->addHour()->addMinutes(30));
                            }
                        }),
                    DatePicker::make('start')
                        ->label(trans('timex::timex.event.start'))
                        ->columnSpan(function (){
                            return config('timex.resources.isStartEndHidden',false) ? 'full' : 2;
                        })
                        ->inlineLabel()
                        ->default(today())
                        ->minDate(today())
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(function ($get,$set,$state){
                            if ($get('end') < $state){
                                $set('end',$state);
                            }
                        })
                        ->extraAttributes([
                            'class' => '-ml-2'
                        ])
                        ->firstDayOfWeek(config('timex.week.start')),
                    TimePicker::make('startTime')
                        ->hidden(config('timex.resources.isStartEndHidden',false))
                        ->withoutSeconds()
                        ->disableLabel()
                        ->required()
                        ->default(now()->setMinutes(0)->addHour())
                        ->reactive()
                        ->extraAttributes([
                            'class' => '-ml-2'
                        ])
                        ->afterStateUpdated(function ($set,$state){
                            $set('endTime',Carbon::parse($state)->addMinutes(30));
                        })
                        ->disabled(function ($get){
                            return $get('isAllDay');
                        }),
                    DatePicker::make('end')
                        ->label(trans('timex::timex.event.end'))
                        ->inlineLabel()
                        ->columnSpan(function (){
                            return config('timex.resources.isStartEndHidden',false) ? 'full' : 2;
                        })
                        ->default(today())
                        ->minDate(today())
                        ->reactive()
                        ->extraAttributes([
                            'class' => '-ml-2'
                        ])
                        ->firstDayOfWeek(config('timex.week.start')),
                    TimePicker::make('endTime')
                        ->hidden(config('timex.resources.isStartEndHidden',false))
                        ->withoutSeconds()
                        ->disableLabel()
                        ->reactive()
                        ->extraAttributes([
                            'class' => '-ml-2'
                        ])
                        ->default(now()->setMinutes(0)->addHour()->addMinutes(30))
                        ->disabled(function ($get){
                            return $get('isAllDay');
                        }),
                ])->columnSpanFull(),
                Section::make('Attachments')->schema([
                    FileUpload::make('attachments')
                        ->multiple()
                        ->preserveFilenames()
                        ->disablePreview()
                        ->disableLabel()
                        ->enableDownload()
                        ->enableOpen()
                ])
                ->heading(trans('timex::timex.event.attachments'))
                ->hidden(!in_array('attachments',\Schema::getColumnListing(self::getEventTableName())))
                ->columnSpanFull()
                ->collapsible()
                ->collapsed(function ($get){
                    return $get('attachments') == null ? true : false;
                })
                ->compact(),
            ]);
    }

    public static function getCreateEditForm(): array
    {
        return [
            Grid::make(3)->schema([
                Card::make([
                    TextInput::make('subject')
                         ->disabled()
                        ->label(trans('timex::timex.event.subject'))
                        ->required(),
                    RichEditor::make('body')

                        ->label(trans('timex::timex.event.body')),
                ])->columnSpan(2),
                Card::make([
                    Grid::make(3)->schema([
                        Toggle::make('isAllDay')
                            ->disabled()
                            ->label(trans('timex::timex.event.allDay'))
                            ->columnSpanFull()
                            ->reactive()
                            ->afterStateUpdated(function ($set, callable $get, $state){
                                $start = today()->setHours(0)->setMinutes(0);
                                $end = today()->setHours(23)->setMinutes(59);
                                if ($state == true){
                                    $set('startTime',$start);
                                    $set('endTime',$end);
                                }else{
                                    $set('startTime',now()->setMinutes(0)->addHour());
                                    $set('endTime',now()->setMinutes(0)->addHour()->addMinutes(30));
                                }
                            }),
                        DatePicker::make('start')
                            ->disabled()
                            ->label(trans('timex::timex.event.start'))
                            ->inlineLabel()
                            ->columnSpan(function (){
                                return config('timex.resources.isStartEndHidden',false) ? 'full' : 2;
                            })
                            ->default(today())
                            ->minDate(today())
                            ->firstDayOfWeek(config('timex.week.start')),
                        TimePicker::make('startTime')
                            ->disabled()
                            ->hidden(config('timex.resources.isStartEndHidden',false))
                            ->withoutSeconds()
                            ->disableLabel()
                            ->default(now()->setMinutes(0)->addHour())
                            ->reactive()
                            ->afterStateUpdated(function ($set,$state){
                                $set('endTime',Carbon::parse($state)->addMinutes(30));
                            })
                            // ->disabled(function ($get){
                            //     return $get('isAllDay');
                            // })
                            ,
                        DatePicker::make('end')
                                 ->disabled()
                            ->label(trans('timex::timex.event.end'))
                            ->inlineLabel()
                            ->columnSpan(function (){
                                return config('timex.resources.isStartEndHidden',false) ? 'full' : 2;
                            })
                            ->default(today())
                            ->minDate(today())
                            ->firstDayOfWeek(config('timex.week.start')),
                        TimePicker::make('endTime')
                             ->disabled()
                            ->hidden(config('timex.resources.isStartEndHidden',false))
                            ->withoutSeconds()
                            ->disableLabel()
                            ->reactive()
                            ->default(now()->setMinutes(0)->addHour()->addMinutes(30))
                            // ->disabled(function ($get){
                            //     return $get('isAllDay');
                            // })
                            
                            ,
                        Select::make('participants')
                            ->disabled()
                            ->label(trans('timex::timex.event.participants'))
                            ->options(function (){
                                return self::getUserModel()::all()
                                    ->pluck(self::getUserModelColumn('name'),self::getUserModelColumn('id'));
                            })
                            ->multiple()->columnSpanFull()->hidden(!in_array('participants',\Schema::getColumnListing(self::getEventTableName()))),
                        Select::make('category')
                            ->disabled()
                            ->label(trans('timex::timex.event.category'))
                            ->columnSpanFull()
                            ->options(function (){
                                return self::isCategoryModelEnabled() ? self::getCategoryModel()::all()
                                    ->pluck(self::getCategoryModelColumn('value'),self::getCategoryModelColumn('key'))
                                    : config('timex.categories.labels');
                            })
                            ->createOptionForm(function (){
                                return self::isCategoryModelEnabled() ? [
                                    TextInput::make('value')->required(),
                                    TextInput::make('icon'),
                                    TextInput::make('color')
                                ] : [];
                            })
                            ->createOptionUsing(function ($data){
                                self::getCategoryModel()::query()->create($data);
                            })
                    ]),
                    Section::make('Attachments')->schema([
                            FileUpload::make('attachments')
                                ->multiple()
                                ->preserveFilenames()
                                ->disablePreview()
                                ->disableLabel()
                                ->enableDownload()
                                ->enableOpen()
                    ])
                    ->heading(trans('timex::timex.event.attachments'))
                    ->hidden(!in_array('attachments',\Schema::getColumnListing(self::getEventTableName())))
                    ->collapsible()
                    ->compact()
                    ->collapsed(function ($get){
                        return $get('attachments') == null ? true : false;
                    }),
                    Radio::make('status')
                    ->options([
                        '0' => 'Reject',
                        '1' => 'In Process',
                        '2' => 'Accept'
                    ])
                    ->reactive()
                    ->afterStateUpdated(function ($set, callable $get, $state){
                        // dd($state);
                        if ($state == 0){
                            $set('category', 'danger');
                        }else if($state == 1){
                            $set('category', 'secondary');
                        }elseif($state == 2){
                            $set('category', 'success');
                        }
                    })
                    ->label('Status')
                    ->inlineLabel()
                    ->columnSpanFull() ,
                ])->columnSpan(1),
            ]),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subject')
                ->label(trans('timex::timex.event.subject')),
                TextColumn::make('invoice_no')
                ->label('Invoice'),
                TextColumn::make('body')
                    ->label(trans('timex::timex.event.body'))
                    ->wrap()
                    ->limit(100),
                TextColumn::make('start')
                    ->label(trans('timex::timex.event.start'))
                    ->date()
                    ->description(fn($record) => $record->startTime),
                TextColumn::make('end')
                    ->label(trans('timex::timex.event.end'))
                    ->date()
                    ->description(fn($record)=> $record->endTime),
                BadgeColumn::make('category')
                    ->label(trans('timex::timex.event.category'))
                    ->enum(config('timex.categories.labels'))
                    ->formatStateUsing(function ($record){
                        if (\Str::isUuid($record->category)){
                            return self::getCategoryModel() == null ? "" : self::getCategoryModel()::findOrFail($record->category)->getAttributes()[self::getCategoryModelColumn('value')];
                        }else{
                            return config('timex.categories.labels')[$record->category] ?? "";
                        }
                    })
                    ->color(function ($record){
                        if (\Str::isUuid($record->category)){
                            return self::getCategoryModel() == null ? "primary" :self::getCategoryModel()::findOrFail($record->category)->getAttributes()[self::getCategoryModelColumn('color')];
                        }else{
                            return config('timex.categories.colors')[$record->category] ?? "primary";
                        }
                    })
            ])->defaultSort('start', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Action::make('Approval')
                
                ->url(fn (TimexEvents $record): string => route('home', $record))
                ->openUrlInNewTab(),
                
                
                // ->action(fn (TimexEvents $record) => $record->approved($record->invoice_no))
                // ->requiresConfirmation()
                // ->color('success')
                // ->visible(fn (TimexEvents $record) => ($record->status == 1 || $record->status == 2 )),

                Action::make('Reject')
                ->action(fn (TimexEvents $record) => $record->reject($record->invoice_no))
                ->requiresConfirmation()
                ->color('danger')
                ->visible(fn (TimexEvents $record) => ($record->status == 1 || $record->status == 0 )),
            ])


            ->bulkActions([
                DeleteBulkAction::make()->action(function (Collection $records){
                    return $records->each(function ($record){
                        return $record->organizer == \Auth::id() ? $record->delete() : '';
                    });
                })
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }

    public static function canEdit(Model $record): bool
    {
        return $record->organizer == \Auth::id();
    }

    public static function canDelete(Model $record): bool
    {
        return $record->organizer == \Auth::id();
    }

    public static function canForceDelete(Model $record): bool
    {
        return $record->organizer == \Auth::id();
    }

}