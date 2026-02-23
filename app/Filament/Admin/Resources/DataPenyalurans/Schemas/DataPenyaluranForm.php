<?php

namespace App\Filament\Admin\Resources\DataPenyalurans\Schemas;

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
                TextInput::make('title')
                    ->label('Judul Data')
                    ->required(),
                FileUpload::make('image')
                    ->label('Gambar/ikon')
                    ->image()
                    ->disk('public')
                    ->directory('penyaluran')
                    ->required(),
                Textarea::make('deskripsi')
                    ->label('Keterangan')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
