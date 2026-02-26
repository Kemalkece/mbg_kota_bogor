<?php

namespace App\Filament\Admin\Resources\Sasaran\Pages;

use App\Filament\Admin\Resources\Sasaran\SasaranResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSasaran extends EditRecord
{
    protected static string $resource = SasaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
