<?php

namespace App\Filament\Admin\Resources\Kolaborasi\Pages;

use App\Filament\Admin\Resources\Kolaborasi\KolaborasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKolaborasi extends ListRecords
{
    protected static string $resource = KolaborasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
