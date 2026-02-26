<?php

namespace App\Filament\Admin\Resources\Tentang\Pages;

use App\Filament\Admin\Resources\Tentang\TentangResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListTentang extends ListRecords
{
    protected static string $resource = TentangResource::class;

    public function getTitle(): string
    {
        return 'Tentang MBG';
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
