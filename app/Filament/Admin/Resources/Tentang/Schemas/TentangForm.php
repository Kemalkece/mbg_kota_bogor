<?php

namespace App\Filament\Admin\Resources\Tentang\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TentangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Judul')
                    ->required(),
                Textarea::make('deskripsi_1')
                    ->label('Deskripsi 1')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('deskripsi_2')
                    ->label('Deskripsi 2')
                    ->columnSpanFull(),
                Textarea::make('list')
                    ->label('Daftar Item')
                    ->columnSpanFull(),
            ]);
    }
}
