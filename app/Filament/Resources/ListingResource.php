<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ListingResource\Pages;
use App\Filament\Resources\ListingResource\RelationManagers;
use App\Models\Listing;
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

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                    TextInput::make('listing_type')
                        ->numeric()
                        ->required(),
                    Textarea::make('description')
                        ->required()
                        ->maxLength(65535),
                    Textarea::make('hosting_instruction')
                        ->required(),
                ]),

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
                
                Fieldset::make('Specification')
                ->schema([
                

                TextInput::make('price_per_hour')
                     ->numeric()
                    ->required(),
                TextInput::make('price_per_day')
                    ->numeric()
                    ->required(),
                Hidden::make('review_stars')
                     ->default(0)
                    ->required(),

                Toggle::make('half_day_discount')
                    ->required(),
                TextInput::make('half_discount_rate')
                    ->label('Half Discount Rate %')
                    ->numeric()
                    ->default(0)
                    ->required(),
                Toggle::make('full_day_discount')
                    ->required(),
                TextInput::make('full_discount_rate')
                        ->label('Full Discount Rate %')
                        ->numeric()
                     ->default(0)
                    ->required(),
                TextInput::make('sale_tax')
                    ->numeric()
                    ->default(0)
                    ->required(),
                TimePicker::make('full_day_start_time')
                    ->required()
                    ->timezone('America/New_York'),
                TimePicker::make('full_day_end_time')
                    ->required()
                    ->timezone('America/New_York'),
                TextInput::make('min_hour')
                        ->numeric()
                        ->minValue(1)
                        ->maxValue(24)
                    ->required(),
                    Toggle::make('cleaning_fee')
                            ->required(),
                    TextInput::make('cleaning_fee_percent')
                             ->numeric()
                            ->default(0)
                            ->required(),
            
                     
                        Textarea::make('advance_notice')
                            ->required()
                            ->maxLength(255)
                            ->maxLength(65535),
                        Toggle::make('status')
                            ->required(),
                    ]) ->columns(4)
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
