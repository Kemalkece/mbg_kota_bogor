<?php

namespace App\Filament\Admin\Resources\Kolaborasi\Schemas;

use Illuminate\Support\Str;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class KolaborasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('nama_instansi')
                    ->label('Nama Instansi')
                    ->required()
                    ->maxLength(255)
                    ->regex('/^[^<>]*$/')
                    ->afterStateUpdated(fn($state, $set) => $set('nama_instansi', strip_tags($state)))
                    ->validationMessages([
                        'regex' => 'Nama instansi tidak boleh mengandung karakter script atau HTML.',
                    ]),
                FileUpload::make('gambar')
                    ->label('Logo Kolaborasi')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(2048) // Limit 2MB untuk Livewire
                    ->rules(['file', 'max:2048']) // Limit 2MB untuk Laravel Backend
                    ->extraInputAttributes(['data-max-file-size' => '2MB']) // Limit 2MB untuk UI (FilePond)
                    ->helperText('Format: JPG, PNG, atau WEBP. Maksimal 2MB.')
                    ->disk('public')
                    ->directory('kolaborasi')
                    ->getUploadedFileNameForStorageUsing(
                        fn(\Livewire\Features\SupportFileUploads\TemporaryUploadedFile $file): string =>
                        (string) Str::uuid() . '.' . $file->getClientOriginalExtension()
                    )
                    ->required(),
            ]);
    }
}
