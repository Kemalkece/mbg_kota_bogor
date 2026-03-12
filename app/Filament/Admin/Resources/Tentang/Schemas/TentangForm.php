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
                    ->required()
                    ->maxLength(255)
                    ->regex('/^[^<>]*$/')
                    ->afterStateUpdated(fn($state, $set) => $set('judul', strip_tags($state))),
                Textarea::make('deskripsi_1')
                    ->label('Deskripsi 1')
                    ->required()
                    ->maxLength(2000)
                    ->regex('/^[^<>]*$/')
                    ->afterStateUpdated(fn($state, $set) => $set('deskripsi_1', strip_tags($state)))
                    ->columnSpanFull(),
                Textarea::make('deskripsi_2')
                    ->label('Deskripsi 2')
                    ->maxLength(2000)
                    ->regex('/^[^<>]*$/')
                    ->afterStateUpdated(fn($state, $set) => $set('deskripsi_2', strip_tags($state)))
                    ->columnSpanFull(),
                Textarea::make('list')
                    ->label('Daftar Item')
                    ->maxLength(2000)
                    ->regex('/^[^<>]*$/')
                    ->afterStateUpdated(fn($state, $set) => $set('list', strip_tags($state)))
                    ->columnSpanFull(),
            ]);
    }
}
