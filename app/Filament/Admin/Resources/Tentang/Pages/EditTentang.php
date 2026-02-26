<?php

namespace App\Filament\Admin\Resources\Tentang\Pages;

use App\Filament\Admin\Resources\Tentang\TentangResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTentang extends EditRecord
{
    protected static string $resource = TentangResource::class;

    public function getTitle(): string
    {
        return 'Ubah Tentang MBG';
    }

    public function getBreadcrumb(): string
    {
        return 'Ubah';
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make('view')
                ->label('Lihat'),

            DeleteAction::make('delete')
                ->label('Hapus'),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction()
                ->label('Simpan'),

            $this->getCancelFormAction()
                ->label('Batal'),
        ];
    }
}
