<?php

namespace App\Filament\Resources\BedroomsTypeResource\Pages;

use App\Filament\Resources\BedroomsTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBedroomsTypes extends ListRecords
{
    protected static string $resource = BedroomsTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
