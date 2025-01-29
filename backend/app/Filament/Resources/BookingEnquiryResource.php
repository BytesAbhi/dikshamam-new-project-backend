<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingEnquiryResource\Pages;
use App\Filament\Resources\BookingEnquiryResource\RelationManagers;
use App\Models\TourBooking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingEnquiryResource extends Resource
{
    protected static ?string $model = TourBooking::class;

    protected static ?string $navigationGroup = 'Booking Enquiries';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mobile')
                    ->required()
                    ->maxLength(15),
                Forms\Components\DatePicker::make('check_in_date')
                    ->required(),
                Forms\Components\DatePicker::make('check_out_date')
                    ->required(),
                Forms\Components\TextInput::make('category')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('adults')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('children')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('tour_id')
                    ->required()
                    ->options(TourPackage::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\Toggle::make('read_status')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mobile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('check_in_date')
                    ->date(),
                Tables\Columns\TextColumn::make('check_out_date')
                    ->date(),
                Tables\Columns\TextColumn::make('category'),
                Tables\Columns\TextColumn::make('adults'),
                Tables\Columns\TextColumn::make('children'),
                Tables\Columns\TextColumn::make('tourPackage.name')
                    ->label('Tour Package')
                    ->searchable(),
                Tables\Columns\IconColumn::make('read_status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Add your filters here if required
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
            'index' => Pages\ListBookingEnquiries::route('/'),
            'create' => Pages\CreateBookingEnquiry::route('/create'),
            'edit' => Pages\EditBookingEnquiry::route('/{record}/edit'),
        ];
    }
}
