<?php

namespace App\Filament\Admin\Resources\Abouts\Pages;

use App\Filament\Admin\Resources\Abouts\AboutResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListAbouts extends ListRecords
{
    protected static string $resource = AboutResource::class;

    // Judul halaman → Bahasa Indonesia
    public function getTitle(): string
    {
        return 'Tentang MBG';
    }

    // Hilangkan tombol Create
    protected function getHeaderActions(): array
    {
        return [];
    }

    // Aksi di tabel → Edit saja
    protected function getTableActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label('Edit Konten'),

            // View diganti "Lihat"
            Actions\ViewAction::make()
                ->label('Lihat'),
        ];
    }
}