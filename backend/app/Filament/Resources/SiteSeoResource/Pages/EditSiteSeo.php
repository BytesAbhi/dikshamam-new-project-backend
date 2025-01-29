<?php

namespace App\Filament\Resources\SiteSeoResource\Pages;

use App\Filament\Resources\SiteSeoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiteSeo extends EditRecord
{
    protected static string $resource = SiteSeoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
