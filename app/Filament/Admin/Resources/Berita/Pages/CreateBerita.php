<?php

namespace App\Filament\Admin\Resources\Berita\Pages;

use App\Filament\Admin\Resources\Berita\BeritaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBerita extends CreateRecord
{
    protected static string $resource = BeritaResource::class;

    // disable the "create another" button so only one submit exists
    protected static bool $canCreateAnother = false;

    public function getTitle(): \Illuminate\Contracts\Support\Htmlable | string
    {
        return 'Buat Berita Baru';
    }

    protected function getCreateFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateFormAction()
            ->label('Buat Berita');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
