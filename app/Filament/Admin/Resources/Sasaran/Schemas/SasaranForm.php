<?php

namespace App\Filament\Admin\Resources\Sasaran\Schemas;

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
                TextInput::make('klasifikasi')
                    ->label('Klasifikasi')
                    ->required(),
                Textarea::make('judul_deskripsi')
                    ->label('Judul Deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull()
                    ->helperText('Maksimal 300 karakter.')
                    ->rules(['required', 'max:300'])
                    ->extraAttributes([
                        'x-init' => "() => {
                            const warn = document.createElement('div');
                            warn.classList.add('text-sm','mt-1');
                            \$el.appendChild(warn);

                            const update = () => {
                                const txt = \$el.value || '';
                                if (txt.length > 300) {
                                    warn.textContent = 'Karakter lebih dari 300';
                                    warn.classList.add('text-red-600');
                                } else {
                                    warn.textContent = '';
                                    warn.classList.remove('text-red-600');
                                }
                                const form = \$el.closest('form');
                                if (form) {
                                    const submit = form.querySelector('button[type=submit]');
                                    if (submit) {
                                        submit.disabled = txt.length > 300;
                                    }
                                }
                            };
                            \$el.addEventListener('input', update);
                            update();
                        }",
                    ]),
                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(2048) // Limit 2MB untuk Livewire
                    ->rules(['file', 'max:2048']) // Limit 2MB untuk Laravel Backend
                    ->extraInputAttributes(['data-max-file-size' => '2MB']) // Limit 2MB untuk UI (FilePond)
                    ->helperText('Format: JPG, PNG, atau WEBP. Maksimal 2MB.')
                    ->disk('public')
                    ->directory('sasaran')
                    ->required(),
            ]);
    }
}
