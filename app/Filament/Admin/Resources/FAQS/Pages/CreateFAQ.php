<?php

namespace App\Filament\Admin\Resources\FAQS\Pages;

use App\Filament\Admin\Resources\FAQS\FAQResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFAQ extends CreateRecord
{
    protected static string $resource = FAQResource::class;
}
