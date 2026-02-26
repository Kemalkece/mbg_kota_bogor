<?php

namespace App\Filament\Admin\Resources\Regulasi\Pages;

use App\Filament\Admin\Resources\Regulasi\RegulasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRegulasi extends EditRecord
{
    protected static string $resource = RegulasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
