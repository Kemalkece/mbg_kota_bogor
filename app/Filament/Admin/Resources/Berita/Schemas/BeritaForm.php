<?php

namespace App\Filament\Admin\Resources\Berita\Schemas;

use Illuminate\Support\Str;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('judul')
                ->label('Judul')
                ->required()
                ->maxLength(255)
                ->regex('/^[^<>]*$/')
                ->validationMessages([
                    'regex' => 'Judul tidak boleh mengandung karakter script atau HTML.',
                ])
                ->helperText('Maksimal 255 karakter.'),

            FileUpload::make('gambar')
                ->label('Gambar')
                ->image()
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->maxSize(2048) // Limit 2MB untuk Livewire
                ->rules(['file', 'max:2048']) // Limit 2MB untuk Laravel Backend
                ->extraInputAttributes(['data-max-file-size' => '2MB']) // Limit 2MB untuk UI (FilePond)
                ->helperText('Format: JPG, PNG, atau WEBP. Maksimal 2MB.')
                ->disk('public')
                ->directory('berita')
                ->getUploadedFileNameForStorageUsing(
                    fn(\Livewire\Features\SupportFileUploads\TemporaryUploadedFile $file): string =>
                    (string) Str::uuid() . '.' . $file->getClientOriginalExtension()
                )
                ->required(),

            RichEditor::make('deskripsi')
                ->label('Deskripsi')
                ->required()
                ->rules(['required', 'max:300'])
                ->maxLength(300)
                ->helperText('Maksimal 300 karakter.')
                ->extraAttributes([
                    'x-init' => "() => {
                        // attach a warning element below the editor
                        const container = \$el;
                        const warn = document.createElement('div');
                        warn.classList.add('text-sm','mt-1');
                        container.appendChild(warn);
                        
                        const el = container.querySelector('trix-editor');
                        if (!el) return;
                        const form = el.closest('form');
                        const submit = form?.querySelector('button[type=submit]');
                        const updateWarning = () => {
                            const txt = el.editor.getDocument().toString();
                            if (txt.length > 300) {
                                warn.textContent = 'Karakter lebih dari 300';
                                warn.classList.add('text-red-600');
                            } else {
                                warn.textContent = '';
                                warn.classList.remove('text-red-600');
                            }
                        };
                        const updateSubmit = () => {
                            if (submit) {
                                submit.disabled = el.editor.getDocument().toString().length > 300;
                            }
                        };
                        el.addEventListener('trix-change', () => {
                            updateWarning();
                            updateSubmit();
                        });
                        updateWarning();
                        updateSubmit();
                    }",
                ])
                ->reactive(),
        ]);
    }
}
