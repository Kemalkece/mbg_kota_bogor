<?php

namespace App\Filament\Admin\Resources\DataPenyaluran\Pages;

use App\Filament\Admin\Resources\DataPenyaluran\DataPenyaluranResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDataPenyaluran extends CreateRecord
{
    protected static string $resource = DataPenyaluranResource::class;

    // disable the "create another" button so only one submit exists
    protected static bool $canCreateAnother = false;

    protected function getCreateFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateFormAction()
            ->label('Buat Data Penyaluran');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
