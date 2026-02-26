<?php

namespace App\Filament\Admin\Resources\Berita\Pages;

use App\Filament\Admin\Resources\Berita\BeritaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBerita extends EditRecord
{
    protected static string $resource = BeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
