<?php

namespace App\Filament\Admin\Resources\DataPenyaluran\Pages;

use App\Filament\Admin\Resources\DataPenyaluran\DataPenyaluranResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDataPenyaluran extends CreateRecord
{
    protected static string $resource = DataPenyaluranResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
