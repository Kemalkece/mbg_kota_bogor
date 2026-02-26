<?php

namespace App\Filament\Admin\Resources\Regulasi\Pages;

use App\Filament\Admin\Resources\Regulasi\RegulasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRegulasi extends ListRecords
{
    protected static string $resource = RegulasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
