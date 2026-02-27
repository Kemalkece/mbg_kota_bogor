<?php

namespace App\Filament\Admin\Resources\Regulasi\Pages;

use App\Filament\Admin\Resources\Regulasi\RegulasiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRegulasi extends CreateRecord
{
    protected static string $resource = RegulasiResource::class;
    
    protected static bool $canCreateAnother = false;
    
    public function getTitle(): string
    {
        return 'Buat Regulasi';
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
