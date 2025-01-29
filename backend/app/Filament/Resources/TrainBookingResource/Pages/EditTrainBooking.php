<?php

namespace App\Filament\Resources\TrainBookingResource\Pages;

use App\Filament\Resources\TrainBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrainBooking extends EditRecord
{
    protected static string $resource = TrainBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
