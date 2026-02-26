<?php

namespace App\Filament\Admin\Resources\Sasaran\Pages;

use App\Filament\Admin\Resources\Sasaran\SasaranResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSasaran extends CreateRecord
{
    protected static string $resource = SasaranResource::class;

    public function afterCreate(): void
    {
        $this->redirect($this->getResource()::getUrl('index'));
    }
}
