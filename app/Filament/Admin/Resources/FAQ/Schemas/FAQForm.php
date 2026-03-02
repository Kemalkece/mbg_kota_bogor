<?php

namespace App\Filament\Admin\Resources\FAQ\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class FAQForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('pertanyaan')
                    ->label('Pertanyaan')
                    ->required(),
                Textarea::make('jawaban')
                    ->label('Jawaban')
                    ->helperText('Maksimal 600 karakter')
                    ->rules(['required', 'max:600'])
                    ->validationMessages(['max' => 'Jawaban tidak boleh lebih dari 600 karakter.'])
                    ->columnSpanFull(),
                Textarea::make('penjelasan')
                    ->label('Poin Penjelasan')
                    ->helperText('Setiap baris adalah satu poin. Maksimal 5 poin. Tekan Enter untuk poin baru. Tidak bisa input lebih dari 5.')
                    ->rows(7)
                    ->reactive()
                    ->afterStateUpdated(function (?string $state, callable $set) {
                        $lines = $state ? preg_split('/\r?\n/', $state) : [];
                        $filtered = array_values(array_filter($lines, fn($l) => strlen(trim($l)) > 0));
                        if (count($filtered) > 5) {
                            $set('penjelasan', implode("\n", array_slice($filtered, 0, 5)));
                        }
                    })
                    ->required()
                    ->minLength(1)
                    ->maxLength(600)
                    ->columnSpanFull(),
                ViewField::make('warning')
                    ->view('components.poin-warning')
                    ->columnSpanFull(),
                TextInput::make('urutan')
                    ->label('Urutan')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
