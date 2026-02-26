<?php

namespace App\Filament\Admin\Resources\Sasaran\Schemas;

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
                    ->required(),
                Textarea::make('judul_deskripsi')
                    ->label('Judul Deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
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
                    ->required(),
            ]);
    }
}
