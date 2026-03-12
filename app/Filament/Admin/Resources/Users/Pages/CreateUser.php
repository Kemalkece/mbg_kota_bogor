<?php

namespace App\Filament\Admin\Resources\Users\Pages;

use App\Filament\Admin\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['force_password_change'] = true;

        return $data;
    }

    protected function afterCreate(): void
    {
        \App\Models\LogAktivitas::record('Membuat Akun Admin/User baru: ' . $this->record->email . ' (' . $this->record->role . ')');
    }
}
