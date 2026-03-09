<?php

namespace App\Filament\Admin\Resources\ActivityLog\Pages;

use App\Filament\Admin\Resources\ActivityLog\ActivityLogResource;
use App\Filament\Admin\Resources\ActivityLog\Tables\ActivityLogTable;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;

class ListActivityLog extends ListRecords
{
    protected static string $resource = ActivityLogResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function table(Table $table): Table
    {
        return ActivityLogTable::configure($table);
    }
}
