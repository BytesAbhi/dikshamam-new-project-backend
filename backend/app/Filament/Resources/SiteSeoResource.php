<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSeoResource\Pages;
use App\Filament\Resources\SiteSeoResource\RelationManagers;
use App\Models\SiteSeo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiteSeoResource extends Resource
{
    protected static ?string $model = SiteSeo::class;

    protected static ?string $navigationGroup = 'Yaatra Site Seo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('meta_title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('meta_desc')
                    ->required(),
                Forms\Components\TextInput::make('meta_keyword')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('meta_title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('meta_desc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_keyword')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->sortable(),
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
            'index' => Pages\ListSiteSeos::route('/'),
            'create' => Pages\CreateSiteSeo::route('/create'),
            'edit' => Pages\EditSiteSeo::route('/{record}/edit'),
        ];
    }
}
