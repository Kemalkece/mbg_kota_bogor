<?php

namespace App\Filament\Admin\Resources\DataPenyaluran\Schemas;

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
                    ->rules([
                        'required',
                        'max:20',
                    ])
                    ->validationMessages([
                        'max' => 'Judul Data tidak boleh lebih dari 20 karakter.',
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
                    ->required(),
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->rules([
                        'required',
                        'max:300',
                    ])
                    ->validationMessages([
                        'max' => 'Deskripsi tidak boleh lebih dari 300 karakter.',
                    ])
                    ->helperText('Maksimal 300 karakter.')
                    ->columnSpanFull(),
            ]);
    }
}
