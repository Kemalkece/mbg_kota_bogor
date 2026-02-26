<?php

namespace App\Filament\Admin\Resources\Berita;

use App\Filament\Admin\Resources\Berita\Pages\CreateBerita;
use App\Filament\Admin\Resources\Berita\Pages\EditBerita;
use App\Filament\Admin\Resources\Berita\Pages\ListBerita;
use App\Filament\Admin\Resources\Berita\Schemas\BeritaForm;
use App\Filament\Admin\Resources\Berita\Tables\BeritaTable;
use App\Models\Berita;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;

    protected static ?string $navigationLabel = 'Berita';
    protected static ?string $modelLabel = 'Berita';
    protected static ?string $pluralModelLabel = 'Berita';

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return BeritaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BeritaTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBerita::route('/'),
            'create' => CreateBerita::route('/create'),
            'edit' => EditBerita::route('/{record}/edit'),
        ];
    }
}
