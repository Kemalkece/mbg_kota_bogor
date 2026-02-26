<?php

namespace App\Filament\Admin\Resources\Berita\Pages;

use App\Filament\Admin\Resources\Berita\BeritaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBerita extends CreateRecord
{

    protected static string $resource = BeritaResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
