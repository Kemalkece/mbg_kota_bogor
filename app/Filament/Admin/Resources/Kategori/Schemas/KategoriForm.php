<?php

namespace App\Filament\Admin\Resources\Kategori\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KategoriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_kategori')
                    ->required()
                    ->unique(ignoreRecord: true),
            ]);
    }
}
