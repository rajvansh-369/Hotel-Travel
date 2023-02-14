<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BedroomsTypeResource\Pages;
use App\Filament\Resources\BedroomsTypeResource\RelationManagers;
use App\Models\BedroomsType;
use App\Models\Listing;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BedroomsTypeResource extends Resource
{
    protected static ?string $model = BedroomsType::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('listing_id')
                //     ->required(),

                    Select::make('listing_id')
                    ->relationship('hotel', 'name')
                     ->label('Hotel Name'),
                Forms\Components\TextInput::make('bedroom_name')
                    ->required()
                    ->maxLength(65535),
                    FileUpload::make('bedroom_image')
                    ->directory('bedroom_image')
                    ->label('Bedroom Image'),
                Forms\Components\TextInput::make('bedroom_price')
                    ->numeric()
                    ->required()
                    ->maxLength(65535),
                    Fieldset::make('Images')
                    ->schema([
                        Repeater::make('images')
                            ->relationship('bedroomPicture')
                            ->schema([
                                FileUpload::make('picture')
                                ->required()
                                ->directory('picture'),
                            ])
                            ->defaultItems(0)
                            ->grid(4)
                            
                    ])
                    ->columns(1),
                    Fieldset::make('Amenities')
                ->schema([
                    Repeater::make('amenities')
                     ->relationship('BedroomAmenities')
                        ->schema([
                            TextInput::make('name')
                            ->label("Hotel's Amenities"),
                            FileUpload::make('icon')
                            ->directory('amenities')
                           ,
                           
                            ])
                            ->maxItems(5)
                            ->label("Hotel's Amenities")
                            ->grid(4)
                        ])
                        ->columns(1),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hotel.name'),
                Tables\Columns\TextColumn::make('bedroom_name'),
                Tables\Columns\TextColumn::make('bedroom_price'),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime(),
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
            'index' => Pages\ListBedroomsTypes::route('/'),
            'create' => Pages\CreateBedroomsType::route('/create'),
            'edit' => Pages\EditBedroomsType::route('/{record}/edit'),
        ];
    }    
}
