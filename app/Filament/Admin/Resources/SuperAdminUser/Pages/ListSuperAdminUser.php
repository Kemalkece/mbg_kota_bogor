<?php

namespace App\Filament\Admin\Resources\SuperAdminUser\Pages;

use App\Filament\Admin\Resources\SuperAdminUser\SuperAdminUserResource;
use App\Filament\Admin\Resources\SuperAdminUser\Schemas\SuperAdminUserForm;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use Filament\Actions;
use App\Filament\Admin\Resources\SuperAdminUser\Tables\SuperAdminUserTable;

class ListSuperAdminUser extends ListRecords
{
    protected static string $resource = SuperAdminUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        return SuperAdminUserTable::configure($table);
    }
}
