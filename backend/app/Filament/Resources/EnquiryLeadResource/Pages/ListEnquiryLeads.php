<?php

namespace App\Filament\Resources\EnquiryLeadResource\Pages;

use App\Filament\Resources\EnquiryLeadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEnquiryLeads extends ListRecords
{
    protected static string $resource = EnquiryLeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
