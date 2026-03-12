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
                    ->required()
                    ->maxLength(255)
                    ->regex('/^[^<>]*$/')
                    ->afterStateUpdated(fn($state, $set) => $set('pertanyaan', strip_tags($state)))
                    ->validationMessages([
                        'regex' => 'Pertanyaan tidak boleh mengandung karakter script atau HTML.',
                    ]),
                Textarea::make('jawaban')
                    ->label('Jawaban')
                    ->helperText('Maksimal 600 karakter')
                    ->maxLength(600)
                    ->required()
                    ->regex('/^[^<>]*$/')
                    ->afterStateUpdated(fn($state, $set) => $set('jawaban', strip_tags($state)))
                    ->validationMessages([
                        'max' => 'Jawaban tidak boleh lebih dari 600 karakter.',
                        'regex' => 'Jawaban tidak boleh mengandung karakter script atau HTML.',
                    ])
                    ->columnSpanFull(),
                Textarea::make('penjelasan')
                    ->label('Poin Penjelasan')
                    ->helperText('Setiap baris adalah satu poin. Maksimal 5 poin. Tekan Enter untuk poin baru. Tidak bisa input lebih dari 5.')
                    ->rows(7)
                    ->reactive()
                    ->required()
                    ->minLength(1)
                    ->maxLength(600)
                    ->rules([
                        'required',
                        'regex:/^[^<>]*$/',
                        function ($attribute, $value, $fail) {
                            if ($value) {
                                $lines = preg_split('/\r?\n/', trim($value));
                                if (count(array_filter($lines, fn($l) => strlen(trim((string) $l)) > 0)) > 5) {
                                    $fail('Penjelasan tidak boleh lebih dari 5 poin.');
                                }
                            }
                        },
                    ])
                    ->afterStateUpdated(function (?string $state, callable $set) {
                        $clean = $state ? strip_tags($state) : '';
                        $lines = preg_split('/\r?\n/', $clean);
                        $filtered = array_values(array_filter($lines, fn($l) => strlen(trim($l)) > 0));
                        if (count($filtered) > 5) {
                            $set('penjelasan', implode("\n", array_slice($filtered, 0, 5)));
                        } else {
                            $set('penjelasan', $clean);
                        }
                    })
                    ->validationMessages([
                        'regex' => 'Penjelasan tidak boleh mengandung karakter script atau HTML.',
                    ])
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
