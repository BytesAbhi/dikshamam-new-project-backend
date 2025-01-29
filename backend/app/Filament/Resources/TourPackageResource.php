<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TourPackageResource\Pages;
use App\Models\TourPackage;
use App\Models\TourCategory;
use App\Models\Destination;
use App\Models\TourType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TourPackageResource extends Resource
{
    protected static ?string $model = TourPackage::class;
    protected static ?string $navigationGroup = 'Tour Bookings';
    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tour_cat_id')
                    ->label('Tour Category')
                    ->options(TourCategory::pluck('category', 'id'))
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('destination_id')
                    ->label('Destination')
                    ->options(Destination::pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('tour_type')
                    ->label('Tour Type')
                    ->options(TourType::pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('tour_code')
                    ->label('Tour Code')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('name')
                    ->label('Tour Name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('nights')
                    ->label('Nights')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('days')
                    ->label('Days')
                    ->numeric()
                    ->required(),

                Forms\Components\Textarea::make('itinerary')
                    ->label('Itinerary')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('inclusions')
                    ->label('Inclusions')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('exclusions')
                    ->label('Exclusions')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->numeric()
                    ->prefix('₹')
                    ->required(),

                Forms\Components\FileUpload::make('image')
                    ->label('Tour Image')
                    ->image()
                    ->required(),

                Forms\Components\Toggle::make('is_featured')
                    ->label('Featured Tour')
                    ->required(),

                Forms\Components\TextInput::make('meta_title')
                    ->label('Meta Title')
                    ->maxLength(255),

                Forms\Components\Textarea::make('meta_desc')
                    ->label('Meta Description')
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('meta_keyword')
                    ->label('Meta Keywords')
                    ->columnSpanFull(),

                Forms\Components\Toggle::make('status')
                    ->label('Status')
                    ->default(1)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tourCategory.category')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('destination.name')
                    ->label('Destination')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('tourType.name')
                    ->label('Tour Type')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('tour_code')
                    ->label('Tour Code')
                    ->searchable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Tour Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nights')
                    ->label('Nights')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('days')
                    ->label('Days')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->money('INR')
                    ->sortable(),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Tour Image'),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),

                Tables\Columns\IconColumn::make('status')
                    ->label('Status')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('is_featured')
                    ->query(fn(Builder $query): Builder => $query->where('is_featured', true))
                    ->label('Featured Tours'),

                Tables\Filters\SelectFilter::make('tour_cat_id')
                    ->label('Tour Category')
                    ->relationship('tourCategory', 'category'),

                Tables\Filters\SelectFilter::make('destination_id')
                    ->label('Destination')
                    ->relationship('destination', 'name'),

                Tables\Filters\SelectFilter::make('tour_type')
                    ->label('Tour Type')
                    ->relationship('tourType', 'name'),

                Tables\Filters\TernaryFilter::make('status')
                    ->label('Status')
                    ->trueLabel('Active')
                    ->falseLabel('Inactive'),
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
            'index' => Pages\ListTourPackages::route('/'),
            'create' => Pages\CreateTourPackage::route('/create'),
            'edit' => Pages\EditTourPackage::route('/{record}/edit'),
        ];
    }
}
