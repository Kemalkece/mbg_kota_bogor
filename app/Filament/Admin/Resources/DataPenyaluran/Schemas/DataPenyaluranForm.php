<?php

namespace App\Filament\Admin\Resources\DataPenyaluran\Schemas;

use Illuminate\Support\Str;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DataPenyaluranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Judul Data')
                    ->required()
                    ->maxLength(20)
                    ->regex('/^[^<>]*$/')
                    ->afterStateUpdated(fn($state, $set) => $set('judul', strip_tags($state)))
                    ->validationMessages([
                        'max' => 'Judul Data tidak boleh lebih dari 20 karakter.',
                        'regex' => 'Judul tidak boleh mengandung karakter script atau HTML.',
                    ])
                    ->helperText('Maksimal 20 karakter.'),
                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(2048) // Limit 2MB untuk Livewire
                    ->rules(['file', 'max:2048']) // Limit 2MB untuk Laravel Backend
                    ->extraInputAttributes(['data-max-file-size' => '2MB']) // Limit 2MB untuk UI (FilePond)
                    ->helperText('Format: JPG, PNG, atau WEBP. Maksimal 2MB.')
                    ->disk('public')
                    ->directory('penyaluran')
                    ->getUploadedFileNameForStorageUsing(
                        fn(\Livewire\Features\SupportFileUploads\TemporaryUploadedFile $file): string =>
                        (string) Str::uuid() . '.' . $file->getClientOriginalExtension()
                    )
                    ->required(),
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->maxLength(300)
                    ->regex('/^[^<>]*$/')
                    ->afterStateUpdated(fn($state, $set) => $set('deskripsi', strip_tags($state)))
                    ->validationMessages([
                        'max' => 'Deskripsi tidak boleh lebih dari 300 karakter.',
                        'regex' => 'Deskripsi tidak boleh mengandung karakter script atau HTML.',
                    ])
                    ->helperText('Maksimal 300 karakter.')
                    ->columnSpanFull(),
            ]);
    }
}
