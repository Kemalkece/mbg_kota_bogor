<?php

namespace App\Filament\Admin\Resources\DataPenyaluran\Pages;

use App\Filament\Admin\Resources\DataPenyaluran\DataPenyaluranResource;
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
