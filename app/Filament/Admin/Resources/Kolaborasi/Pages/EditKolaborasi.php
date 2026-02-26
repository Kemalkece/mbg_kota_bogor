<?php

namespace App\Filament\Admin\Resources\Kolaborasi\Pages;

use App\Filament\Admin\Resources\Kolaborasi\KolaborasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKolaborasi extends EditRecord
{
    protected static string $resource = KolaborasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
