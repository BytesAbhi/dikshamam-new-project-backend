<?php

namespace App\Filament\Resources\BookingEnquiryResource\Pages;

use App\Filament\Resources\BookingEnquiryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBookingEnquiries extends ListRecords
{
    protected static string $resource = BookingEnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
