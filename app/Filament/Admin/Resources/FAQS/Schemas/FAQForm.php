<?php

namespace App\Filament\Admin\Resources\FAQS\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class FAQForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('pertanyaan')
                    ->required(),
                Textarea::make('jawaban')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('urutan')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
