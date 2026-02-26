<?php

namespace App\Filament\Admin\Resources\FAQ\Pages;

use App\Filament\Admin\Resources\FAQ\FAQResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFAQ extends EditRecord
{
    protected static string $resource = FAQResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
