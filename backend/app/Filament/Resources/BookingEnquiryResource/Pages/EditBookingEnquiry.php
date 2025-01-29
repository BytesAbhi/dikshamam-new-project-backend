<?php

namespace App\Filament\Resources\BookingEnquiryResource\Pages;

use App\Filament\Resources\BookingEnquiryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBookingEnquiry extends EditRecord
{
    protected static string $resource = BookingEnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
