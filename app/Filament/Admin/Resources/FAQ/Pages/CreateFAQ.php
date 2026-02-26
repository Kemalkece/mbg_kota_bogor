<?php

namespace App\Filament\Admin\Resources\FAQ\Pages;

use App\Filament\Admin\Resources\FAQ\FAQResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFAQ extends CreateRecord
{
    protected static string $resource = FAQResource::class;

    /**
     * ✅ Judul halaman
     */
    public function getTitle(): string
    {
        return 'Tambah FAQ';
    }

    /**
     * ✅ Breadcrumb
     */
    public function getBreadcrumb(): string
    {
        return 'Tambah';
    }

    /**
     * ✅ Tombol:
     * - Simpan
     * - Batal
     * ❌ Tanpa "Create & create another"
     */
    protected function getFormActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Simpan')
                ->submit('create')
                ->successRedirectUrl(
                    $this->getResource()::getUrl('index')
                ),

            Actions\Action::make('batal')
                ->label('Batal')
                ->color('gray')
                ->url(
                    $this->getResource()::getUrl('index')
                ),
        ];
    }
}