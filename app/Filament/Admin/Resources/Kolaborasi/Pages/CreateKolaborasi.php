<?php

namespace App\Filament\Admin\Resources\Kolaborasi\Pages;

use App\Filament\Admin\Resources\Kolaborasi\KolaborasiResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKolaborasi extends CreateRecord
{
    protected static string $resource = KolaborasiResource::class;

    protected static bool $canCreateAnother = false;

    public function getTitle(): string
    {
        return 'Buat Kolaborasi';
    }
}
