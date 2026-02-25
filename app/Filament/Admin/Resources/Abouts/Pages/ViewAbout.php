<?php

namespace App\Filament\Admin\Resources\Abouts\Pages;

use App\Filament\Admin\Resources\Abouts\AboutResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewAbout extends ViewRecord
{
    protected static string $resource = AboutResource::class;

    /**
     * Judul tab browser + heading halaman
     */
    public function getTitle(): string
    {
        return 'Lihat Tentang MBG';
    }

    /**
     * Label breadcrumb (mengganti "View")
     */
    public function getBreadcrumb(): string
    {
        return 'Lihat';
    }

    /**
     * Tombol di kanan atas halaman
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label('Edit Konten'),

            Actions\DeleteAction::make()
                ->label('Hapus'),
        ];
    }
}