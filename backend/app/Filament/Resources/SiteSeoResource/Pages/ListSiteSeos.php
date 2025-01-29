<?php

namespace App\Filament\Resources\SiteSeoResource\Pages;

use App\Filament\Resources\SiteSeoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiteSeos extends ListRecords
{
    protected static string $resource = SiteSeoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
