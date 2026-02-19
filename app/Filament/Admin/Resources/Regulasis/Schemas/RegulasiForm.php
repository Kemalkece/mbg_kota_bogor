<?php

namespace App\Filament\Admin\Resources\Regulasis\Schemas;

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
                FileUpload::make('pdf_file')
                    ->label('File PDF')
                    ->disk('public')
                    ->directory('regulasi')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
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
