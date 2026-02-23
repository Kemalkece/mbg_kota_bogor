<?php

namespace App\Filament\Admin\Resources\DataPenyalurans\Pages;

use App\Filament\Admin\Resources\DataPenyalurans\DataPenyaluranResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataPenyaluran extends EditRecord
{
    protected static string $resource = DataPenyaluranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
