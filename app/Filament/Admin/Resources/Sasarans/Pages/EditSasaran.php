<?php

namespace App\Filament\Admin\Resources\Sasarans\Pages;

use App\Filament\Admin\Resources\Sasarans\SasaranResource;
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
