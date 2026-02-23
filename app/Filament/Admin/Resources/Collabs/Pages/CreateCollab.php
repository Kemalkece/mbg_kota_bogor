<?php

namespace App\Filament\Admin\Resources\Collabs\Pages;

use App\Filament\Admin\Resources\Collabs\CollabResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCollab extends CreateRecord
{
    protected static string $resource = CollabResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
