<?php

namespace App\Filament\Resources\WebsiteVideoResource\Pages;

use App\Filament\Resources\WebsiteVideoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWebsiteVideos extends ListRecords
{
    protected static string $resource = WebsiteVideoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
