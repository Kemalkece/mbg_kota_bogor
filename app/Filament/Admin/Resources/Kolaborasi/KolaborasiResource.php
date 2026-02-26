<?php

namespace App\Filament\Admin\Resources\Kolaborasi;

use App\Filament\Admin\Resources\Kolaborasi\Pages\CreateKolaborasi;
use App\Filament\Admin\Resources\Kolaborasi\Pages\EditKolaborasi;
use App\Filament\Admin\Resources\Kolaborasi\Pages\ListKolaborasi;
use App\Filament\Admin\Resources\Kolaborasi\Schemas\KolaborasiForm;
use App\Filament\Admin\Resources\Kolaborasi\Tables\KolaborasiTable;
use App\Models\Kolaborasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KolaborasiResource extends Resource
{
    protected static ?string $model = Kolaborasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static ?string $navigationLabel = 'Kolaborasi';
    protected static ?string $modelLabel = 'Kolaborasi';
    protected static ?string $pluralModelLabel = 'Kolaborasi';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return KolaborasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KolaborasiTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKolaborasi::route('/'),
            'create' => CreateKolaborasi::route('/create'),
            'edit' => EditKolaborasi::route('/{record}/edit'),
        ];
    }
}
