<?php

namespace App\Filament\Admin\Resources\Sasarans\Schemas;

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
                TextInput::make('title')
                    ->required(),
                TextInput::make('klasifikasi')
                    ->required(),
                Textarea::make('title_deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->disk('public')
                    ->directory('sasaran')
                    ->image()
                    ->required(),
            ]);
    }
}
