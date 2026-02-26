<?php

namespace App\Filament\Admin\Resources\Tentang\Pages;

use App\Filament\Admin\Resources\Tentang\TentangResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewTentang extends ViewRecord
{
    protected static string $resource = TentangResource::class;

    public function getTitle(): string
    {
        return 'Lihat Tentang MBG';
    }

    public function getBreadcrumb(): string
    {
        return 'Lihat';
    }

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
