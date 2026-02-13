<?php

namespace App\Filament\Admin\Resources\Sasarans\Pages;

use App\Filament\Admin\Resources\Sasarans\SasaranResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSasaran extends CreateRecord
{
    protected static string $resource = SasaranResource::class;

    public function afterCreate(): void
    {
        $this->redirect($this->getResource()::getUrl('index'));
    }
}
