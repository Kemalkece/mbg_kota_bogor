<?php

namespace App\Filament\Admin\Resources\Abouts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AboutInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('judul'),
                TextEntry::make('deskripsi_1')
                    ->columnSpanFull(),
                TextEntry::make('deskripsi_2')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('list')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
