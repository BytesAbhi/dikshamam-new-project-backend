<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnquiryLeadResource\Pages;
use App\Filament\Resources\EnquiryLeadResource\RelationManagers;
use App\Models\EnquiryLead;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EnquiryLeadResource extends Resource
{
    protected static ?string $model = EnquiryLead::class;


    protected static ?string $navigationGroup = 'Enquiries';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('email')->required(),
            Forms\Components\TextInput::make('mobile')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('mobile'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEnquiryLeads::route('/'),
            'create' => Pages\CreateEnquiryLead::route('/create'),
            'edit' => Pages\EditEnquiryLead::route('/{record}/edit'),
        ];
    }
}
