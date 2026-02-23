<?php

namespace App\Filament\Admin\Resources\Collabs\Pages;

use App\Filament\Admin\Resources\Collabs\CollabResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCollab extends EditRecord
{
    protected static string $resource = CollabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
