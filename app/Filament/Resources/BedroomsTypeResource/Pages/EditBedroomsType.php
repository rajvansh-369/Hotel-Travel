<?php

namespace App\Filament\Resources\BedroomsTypeResource\Pages;

use App\Filament\Resources\BedroomsTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBedroomsType extends EditRecord
{
    protected static string $resource = BedroomsTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
