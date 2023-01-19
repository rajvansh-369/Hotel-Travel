<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ListingResource\Pages;
use App\Filament\Resources\ListingResource\RelationManagers;
use App\Models\Amenity;
use App\Models\Listing;
use Closure;
use DateTime;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ListingResource extends Resource
{
    protected static ?string $model = Listing::class;

    protected static ?string $navigationIcon = 'fas-hotel';

    protected static ?string $navigationLabel = 'Hotels';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')
                
                ->default(auth()->user()->id)
                ->required(),
                Fieldset::make('Basic Details')
                ->schema([

                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),

                    Textarea::make('description')
                        ->required()
                        ->maxLength(65535),
                        Textarea::make('advance_notice')
                        ->required()
                        ->maxLength(255)
                        ->maxLength(65535),
                ]) ->columns(3),

                Fieldset::make('Address')
                    ->relationship('address')
                    ->schema([

                        TextInput::make('lat')
                            ->label('Latitude')
                            ->required()
                            ->maxLength(255),
                            TextInput::make('lng')
                            ->label('Longitude')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('formatted_address')
                            ->label('Formatted Address')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('postal_code')
                            ->label('Pin Code')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('address')
                            ->label('Street')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('city')
                             ->default('Gaya')
                            ->label('City')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('state')
                             ->default("Bihar")
                            ->label('State')
                            ->required()
                            ->maxLength(255),


                    ]) ->columns(2),

                Fieldset::make('Images')
                ->schema([
                    Repeater::make('images')
                        ->relationship('picture')
                        ->schema([

                            Select::make('picture_type')
                            ->options(['main_picture' => 'Main Picture', 'rest_image' => 'Others'])
                            ->label('Pictutres type'),
                            FileUpload::make('picture')
                            ->required()
                            ->directory('picture')
                           ,
                        ])
                        ->defaultItems(0)
                        ->grid(4)
                        
                ])
                ->columns(1),

                Fieldset::make('Video')
                ->schema([
                    Repeater::make('videos')
                        ->relationship('videos')
                        ->schema([

                            FileUpload::make('video')
                            ->required()
                            ->directory('videos')
                           ,
                        ])
                        ->defaultItems(0)
                        ->grid(4)
                        
                ])
                ->columns(1),


                Fieldset::make('Amenities')
                ->schema([
                    Repeater::make('amenities')
                ->relationship('lisitng_amenities')
                        ->schema([
                            
                            Select::make('amenity_id')
                            // ->multiple()
                            ->options(Amenity::all()->pluck('name', 'id'))
                            ->label('Select Amenity')
                            // ->options([
                            //     'tailwind' => 'Tailwind CSS',
                            //     'alpine' => 'Alpine.js',
                            //     'laravel' => 'Laravel',
                            //     'livewire' => 'Laravel Livewire',
                            // ])

                            ])
                            ->label("Hotel's Amenities")
                            ->grid(4)
                        ])
                        ->columns(1),

                
                Fieldset::make('Specification')
                ->schema([
                

                TextInput::make('price_per_hour')
                     ->numeric()
                    ->required(),
                TextInput::make('price_per_day')
                    ->numeric()
                    ->required(),

                Toggle::make('half_day_discount')
                        ->reactive()
                    ->required(),
                TextInput::make('half_discount_rate')
                ->reactive()
                    ->label('Half Day Discount %')
                    ->numeric()
                    ->default(0)
                    ->required()
                    ->disabled(fn (Closure $get) => $get('half_day_discount') == 0 ? True : False ),
                Toggle::make('full_day_discount')
                     ->reactive()
                    ->required(),
                TextInput::make('full_discount_rate')
                        ->reactive()
                        ->label('Full Discount Rate %')
                        ->numeric()
                     ->default(0)
                    ->required()
                    ->disabled(fn (Closure $get) => $get('full_day_discount') == 0 ? True : False ),
                TextInput::make('sale_tax')
                    ->numeric()
                    ->default(0)
                    ->required(),
                TimePicker::make('full_day_start_time')
                    ->required()
                    ->timezone('Asia/Kolkata'),
                TimePicker::make('full_day_end_time')
                    ->required()
                    ->timezone('Asia/Kolkata'),
                TextInput::make('min_hour')
                        ->label('Minimum Hour Booking')
                        ->numeric()
                        ->minValue(1)
                        ->maxValue(24)
                    ->required(),
            
                     
                       
                        Toggle::make('status')
                            ->required(),
                    ]) ->columns(5)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('picture'),
                Tables\Columns\TextColumn::make('price_per_hour'),
                Tables\Columns\TextColumn::make('price_per_day'),
                Tables\Columns\TextColumn::make('review_stars'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\IconColumn::make('half_day_discount')
                    ->boolean(),
                Tables\Columns\IconColumn::make('half_discount_rate')
                    ->boolean(),
                Tables\Columns\IconColumn::make('full_day_discount')
                    ->boolean(),
                Tables\Columns\IconColumn::make('full_discount_rate')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sale_tax'),
                Tables\Columns\TextColumn::make('full_day_start_time'),
                Tables\Columns\TextColumn::make('full_day_end_time'),
                Tables\Columns\TextColumn::make('min_hour'),
                Tables\Columns\TextColumn::make('advance_notice'),
                Tables\Columns\TextColumn::make('hosting_instruction'),
                Tables\Columns\TextColumn::make('cleaning_fee'),
                Tables\Columns\TextColumn::make('cleaning_fee_percent'),
                Tables\Columns\TextColumn::make('listing_type'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListListings::route('/'),
            'create' => Pages\CreateListing::route('/create'),
            'edit' => Pages\EditListing::route('/{record}/edit'),
        ];
    }    
}
