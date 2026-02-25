<?php

namespace App\Filament\Admin\Resources\Beritas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('judul')
                ->label('Judul')
                ->required(),

            FileUpload::make('gambar')
                ->label('Gambar')
                ->image()
                ->disk('public')
                ->directory('berita')
                ->required(),

            Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->required(),
        ]);
    }
}