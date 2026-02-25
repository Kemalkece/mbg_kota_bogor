<?php

namespace App\Filament\Admin\Resources\Abouts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AboutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                Textarea::make('deskripsi_1')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('deskripsi_2')
                    ->columnSpanFull(),
                Textarea::make('list')
                    ->columnSpanFull(),
            ]);
    }
}
