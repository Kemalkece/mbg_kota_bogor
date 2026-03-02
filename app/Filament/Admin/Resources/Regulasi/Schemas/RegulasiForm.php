<?php

namespace App\Filament\Admin\Resources\Regulasi\Schemas;

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
                    ->required(),
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->helperText('Maksimal 600 karakter')
                    ->rules(['required', 'max:600'])
                    ->validationMessages(['max' => 'Deskripsi tidak boleh lebih dari 600 karakter.'])
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
                Select::make('kategori_id')
                    ->relationship('kategori', 'nama_kategori')
                    ->createOptionForm([
                        TextInput::make('nama_kategori')
                            ->required(),
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
