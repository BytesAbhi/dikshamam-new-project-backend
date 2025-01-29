<?php

namespace App\Filament\Resources\VolvoBookingResource\Pages;

use App\Filament\Resources\VolvoBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVolvoBookings extends ListRecords
{
    protected static string $resource = VolvoBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
