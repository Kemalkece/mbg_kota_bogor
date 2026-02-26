<?php

namespace App\Filament\Admin\Resources\Sasaran\Pages;

use App\Filament\Admin\Resources\Sasaran\SasaranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSasaran extends ListRecords
{
    protected static string $resource = SasaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
