<?php

namespace App\Filament\Admin\Resources\SuperAdminUser\Pages;

use App\Filament\Admin\Resources\SuperAdminUser\SuperAdminUserResource;
use App\Filament\Admin\Resources\SuperAdminUser\Schemas\SuperAdminUserForm;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;

class EditSuperAdminUser extends EditRecord
{
    protected static string $resource = SuperAdminUserResource::class;

    public function form(Schema $schema): Schema
    {
        return SuperAdminUserForm::configure($schema);
    }
}
