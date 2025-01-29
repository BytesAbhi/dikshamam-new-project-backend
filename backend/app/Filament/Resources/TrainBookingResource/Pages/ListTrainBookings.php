<?php

namespace App\Filament\Resources\TrainBookingResource\Pages;

use App\Filament\Resources\TrainBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrainBookings extends ListRecords
{
    protected static string $resource = TrainBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
