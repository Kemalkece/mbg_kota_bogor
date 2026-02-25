<?php

namespace App\Filament\Admin\Resources\Abouts\Pages;

use App\Filament\Admin\Resources\Abouts\AboutResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditAbout extends EditRecord
{
    protected static string $resource = AboutResource::class;

    /**
     * Judul halaman
     */
    public function getTitle(): string
    {
        return 'Ubah Tentang MBG';
    }

    /**
     * Breadcrumb
     */
    public function getBreadcrumb(): string
    {
        return 'Ubah';
    }

    /**
     * Tombol kanan atas
     */
    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make('view')
                ->label('Lihat'),

            DeleteAction::make('delete')
                ->label('Hapus'),
        ];
    }

    /**
     * Tombol bawah form (Save & Cancel)
     */
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