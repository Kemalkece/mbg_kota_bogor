<?php

namespace App\Filament\Admin\Resources\DataPenyaluran\Pages;

use App\Filament\Admin\Resources\DataPenyaluran\DataPenyaluranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataPenyaluran extends ListRecords
{
    protected static string $resource = DataPenyaluranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
