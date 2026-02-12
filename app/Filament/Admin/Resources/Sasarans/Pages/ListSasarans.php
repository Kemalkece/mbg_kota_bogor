<?php

namespace App\Filament\Admin\Resources\Sasarans\Pages;

use App\Filament\Admin\Resources\Sasarans\SasaranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSasarans extends ListRecords
{
    protected static string $resource = SasaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
