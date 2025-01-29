<?php

namespace App\Filament\Resources\EnquiryLeadResource\Pages;

use App\Filament\Resources\EnquiryLeadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEnquiryLead extends EditRecord
{
    protected static string $resource = EnquiryLeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
