<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Nama item')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Deskripsi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Harga Item')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Harga Restock')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Tanggal Restock')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Stock')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Nama item')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Deskripsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Harga Item')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Harga Restock')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Tanggal Restock')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Stock')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
