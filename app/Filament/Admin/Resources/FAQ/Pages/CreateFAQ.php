<?php

namespace App\Filament\Admin\Resources\FAQ\Pages;

use App\Filament\Admin\Resources\FAQ\FAQResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFAQ extends CreateRecord
{
    protected static string $resource = FAQResource::class;

    protected static bool $canCreateAnother = false;

    public function getTitle(): string
    {
        return 'Buat FAQ';
    }
}