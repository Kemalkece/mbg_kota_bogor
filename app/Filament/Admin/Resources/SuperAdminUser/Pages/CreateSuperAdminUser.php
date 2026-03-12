<?php

namespace App\Filament\Admin\Resources\SuperAdminUser\Pages;

use App\Filament\Admin\Resources\SuperAdminUser\SuperAdminUserResource;
use App\Filament\Admin\Resources\SuperAdminUser\Schemas\SuperAdminUserForm;
use Filament\Resources\Pages\CreateRecord;
use Filament\Schemas\Schema;

class CreateSuperAdminUser extends CreateRecord
{
    protected static string $resource = SuperAdminUserResource::class;

    public function form(Schema $schema): Schema
    {
        return SuperAdminUserForm::configure($schema);
    }
}
