<?php

namespace App\Filament\Admin\Resources\DataPenyalurans\Pages;

use App\Filament\Admin\Resources\DataPenyalurans\DataPenyaluranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataPenyalurans extends ListRecords
{
    protected static string $resource = DataPenyaluranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
