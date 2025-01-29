<?php

namespace App\Filament\Resources\HotelDestinationResource\Pages;

use App\Filament\Resources\HotelDestinationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHotelDestination extends EditRecord
{
    protected static string $resource = HotelDestinationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
