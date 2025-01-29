<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;


    protected static ?string $navigationGroup = 'Add Sliders';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\Textarea::make('description')->required(),
            Forms\Components\TextInput::make('btn1_txt')->required(),
            Forms\Components\TextInput::make('btn1_link')->required(),
            Forms\Components\TextInput::make('btn2_txt')->required(),
            Forms\Components\TextInput::make('btn2_link')->required(),
            Forms\Components\TextInput::make('slide_order')->numeric()->required(),
            Forms\Components\FileUpload::make('image')->directory('sliders')->image()->required(),
            Forms\Components\Toggle::make('status')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('description'),
                TextColumn::make('btn1_txt'),
                TextColumn::make('btn1_link'),
                TextColumn::make('btn2_txt'),
                TextColumn::make('btn2_link'),
                TextColumn::make('slide_order'),
                ImageColumn::make('logo')
                    ->disk('sliders') // Make sure it's stored in public
                    ->size(50)
                    ->circular(),
                IconColumn::make('status')->boolean(),
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
