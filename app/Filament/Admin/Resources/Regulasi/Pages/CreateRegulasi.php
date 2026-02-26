<?php

namespace App\Filament\Admin\Resources\Regulasi\Pages;

use App\Filament\Admin\Resources\Regulasi\RegulasiResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRegulasi extends CreateRecord
{
    protected static string $resource = RegulasiResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
