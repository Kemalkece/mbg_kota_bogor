<?php

namespace App\Filament\Admin\Resources\Regulasis\Pages;

use App\Filament\Admin\Resources\Regulasis\RegulasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRegulasis extends ListRecords
{
    protected static string $resource = RegulasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
