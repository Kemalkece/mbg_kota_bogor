<?php

namespace App\Filament\Admin\Resources\Sasaran\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SasaranTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('klasifikasi')
                    ->label('Klasifikasi')
                    ->searchable(),
                TextColumn::make('judul_deskripsi')
                    ->label('Judul Deskripsi')
                    ->searchable(),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->wrap(20),
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
