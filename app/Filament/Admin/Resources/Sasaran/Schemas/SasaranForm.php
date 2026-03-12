<?php

namespace App\Filament\Admin\Resources\Sasaran\Schemas;

use Illuminate\Support\Str;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SasaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('klasifikasi')
                    ->label('Klasifikasi')
                    ->required()
                    ->maxLength(255)
                    ->regex('/^[^<>]*$/')
                    ->afterStateUpdated(fn($state, $set) => $set('klasifikasi', strip_tags($state)))
                    ->validationMessages([
                        'regex' => 'Klasifikasi tidak boleh mengandung karakter script atau HTML.',
                    ]),
                Textarea::make('judul_deskripsi')
                    ->label('Judul Deskripsi')
                    ->required()
                    ->maxLength(500)
                    ->regex('/^[^<>]*$/')
                    ->afterStateUpdated(fn($state, $set) => $set('judul_deskripsi', strip_tags($state)))
                    ->validationMessages([
                        'regex' => 'Judul Deskripsi tidak boleh mengandung karakter script atau HTML.',
                    ])
                    ->columnSpanFull(),
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->maxLength(1000)
                    ->regex('/^[^<>]*$/')
                    ->afterStateUpdated(fn($state, $set) => $set('deskripsi', strip_tags($state)))
                    ->validationMessages([
                        'regex' => 'Deskripsi tidak boleh mengandung karakter script atau HTML.',
                    ])
                    ->columnSpanFull(),
                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(2048) // Limit 2MB untuk Livewire
                    ->rules(['file', 'max:2048']) // Limit 2MB untuk Laravel Backend
                    ->extraInputAttributes(['data-max-file-size' => '2MB']) // Limit 2MB untuk UI (FilePond)
                    ->helperText('Format: JPG, PNG, atau WEBP. Maksimal 2MB.')
                    ->disk('public')
                    ->directory('sasaran')
                    ->getUploadedFileNameForStorageUsing(
                        fn(\Livewire\Features\SupportFileUploads\TemporaryUploadedFile $file): string =>
                        (string) Str::uuid() . '.' . $file->getClientOriginalExtension()
                    )
                    ->required(),
            ]);
    }
}
