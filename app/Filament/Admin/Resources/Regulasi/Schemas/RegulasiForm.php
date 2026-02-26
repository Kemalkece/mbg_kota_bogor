<?php

namespace App\Filament\Admin\Resources\Regulasi\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
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
                TextInput::make('judul')
                    ->label('Judul')
                    ->required(),
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
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
