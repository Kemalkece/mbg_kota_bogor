<?php

namespace App\Filament\Admin\Resources\Kategori\Pages;

use App\Filament\Admin\Resources\Kategori\KategoriResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKategori extends ListRecords
{
    protected static string $resource = KategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
