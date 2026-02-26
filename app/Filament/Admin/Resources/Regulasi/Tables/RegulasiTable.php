<?php

namespace App\Filament\Admin\Resources\Regulasi\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RegulasiTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('file_pdf')
                    ->label('File PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->formatStateUsing(fn() => 'Download')
                    ->url(fn($record) => asset('storage/' . $record->file_pdf))
                    ->openUrlInNewTab()
                    ->color('primary')
                    ->searchable(),
                TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable(),
                TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('tahun')
                    ->date()
                    ->sortable(),
                TextColumn::make('urutan')
                    ->numeric()
                    ->sortable(),
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
