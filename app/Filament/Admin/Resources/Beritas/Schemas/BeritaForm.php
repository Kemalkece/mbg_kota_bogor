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
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                FileUpload::make('image')
                ->disk('public')
                ->directory('berita')
                    ->image()
                    ->required(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
