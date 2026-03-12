<?php

namespace App\Filament\Admin\Resources\Regulasi\Schemas;

use Illuminate\Support\Str;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ViewField;
use Filament\Schemas\Schema;

class RegulasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('file_pdf')
                    ->label('File PDF')
                    ->disk('public')
                    ->directory('regulasi')
                    ->getUploadedFileNameForStorageUsing(
                        fn(\Livewire\Features\SupportFileUploads\TemporaryUploadedFile $file): string =>
                        (string) Str::uuid() . '.' . $file->getClientOriginalExtension()
                    )
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(10240) // Limit 10MB untuk Livewire
                    ->rules(['file', 'max:10240']) // Limit 10MB untuk Laravel Backend
                    ->extraInputAttributes(['data-max-file-size' => '10MB']) // Limit 10MB untuk UI (FilePond)
                    ->helperText('Format: PDF. Maksimal 10MB.')
                    ->required(),
                ViewField::make('fileWarning')
                    ->view('components.file-warning')
                    ->columnSpanFull(),
                TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255)
                    ->regex('/^[^<>]*$/')
                    ->afterStateUpdated(fn($state, $set) => $set('judul', strip_tags($state)))
                    ->validationMessages([
                        'regex' => 'Judul tidak boleh mengandung karakter script atau HTML.',
                    ]),
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->helperText('Maksimal 600 karakter')
                    ->required()
                    ->maxLength(600)
                    ->regex('/^[^<>]*$/')
                    ->afterStateUpdated(fn($state, $set) => $set('deskripsi', strip_tags($state)))
                    ->validationMessages([
                        'max' => 'Deskripsi tidak boleh lebih dari 600 karakter.',
                        'regex' => 'Deskripsi tidak boleh mengandung karakter script atau HTML.',
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
                Select::make('kategori_id')
                    ->relationship('kategori', 'nama_kategori')
                    ->createOptionForm([
                        TextInput::make('nama_kategori')
                            ->required()
                            ->maxLength(100)
                            ->regex('/^[^<>]*$/')
                            ->afterStateUpdated(fn($state, $set) => $set('nama_kategori', strip_tags($state))),
                    ])
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('status')
                    ->options(['Berlaku' => 'Berlaku', 'Aktif' => 'Aktif', 'Wajib' => 'Wajib'])
                    ->required(),
                DatePicker::make('tahun')
                    ->required(),
                TextInput::make('urutan')
                    ->required()
                    ->numeric(),
            ]);
    }
}
