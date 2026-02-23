<?php

namespace App\Filament\Admin\Resources\Collabs\Pages;

use App\Filament\Admin\Resources\Collabs\CollabResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCollabs extends ListRecords
{
    protected static string $resource = CollabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
