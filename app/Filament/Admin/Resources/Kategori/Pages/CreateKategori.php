<?php

namespace App\Filament\Admin\Resources\Kategori\Pages;

use App\Filament\Admin\Resources\Kategori\KategoriResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKategori extends CreateRecord
{
    protected static string $resource = KategoriResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
