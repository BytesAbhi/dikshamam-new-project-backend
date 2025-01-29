<?php

namespace App\Filament\Resources\HotelDestinationResource\Pages;

use App\Filament\Resources\HotelDestinationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHotelDestinations extends ListRecords
{
    protected static string $resource = HotelDestinationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
