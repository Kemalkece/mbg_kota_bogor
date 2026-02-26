<?php

namespace App\Filament\Admin\Resources\Berita\Pages;

use App\Filament\Admin\Resources\Berita\BeritaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBerita extends ListRecords
{
    protected static string $resource = BeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
