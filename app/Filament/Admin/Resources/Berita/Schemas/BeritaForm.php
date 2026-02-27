<?php

namespace App\Filament\Admin\Resources\Berita\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('judul')
                ->label('Judul')
                ->required()
                ->rules(['required','max:50'])
                ->helperText('Maksimal 50 karakter.'),

            FileUpload::make('gambar')
                ->label('Gambar')
                ->image()
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->maxSize(2048) // Limit 2MB untuk Livewire
                ->rules(['file', 'max:2048']) // Limit 2MB untuk Laravel Backend
                ->extraInputAttributes(['data-max-file-size' => '2MB']) // Limit 2MB untuk UI (FilePond)
                ->helperText('Format: JPG, PNG, atau WEBP. Maksimal 2MB.')
                ->disk('public')
                ->directory('berita')
                ->required(),

            RichEditor::make('deskripsi')
                ->label('Deskripsi')

                ->required(),
        ]);
    }
}
