<?php

namespace App\Filament\Admin\Resources\Regulasis\Pages;

use App\Filament\Admin\Resources\Regulasis\RegulasiResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRegulasi extends CreateRecord
{
    protected static string $resource = RegulasiResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
