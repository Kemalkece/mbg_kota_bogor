<?php

namespace App\Filament\Admin\Resources\Collabs;

use App\Filament\Admin\Resources\Collabs\Pages\CreateCollab;
use App\Filament\Admin\Resources\Collabs\Pages\EditCollab;
use App\Filament\Admin\Resources\Collabs\Pages\ListCollabs;
use App\Filament\Admin\Resources\Collabs\Schemas\CollabForm;
use App\Filament\Admin\Resources\Collabs\Tables\CollabsTable;
use App\Models\Collab;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CollabResource extends Resource
{
    protected static ?string $model = Collab::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    // 🔥 Biar tidak jadi "Collabs"
    protected static ?string $navigationLabel = 'Collab';
    protected static ?string $modelLabel = 'Collab';
    protected static ?string $pluralModelLabel = 'Collab';

    protected static ?string $recordTitleAttribute = 'nama'; 
    // ganti 'nama' sesuai kolom utama di tabel kamu

    public static function form(Schema $schema): Schema
    {
        return CollabForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CollabsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCollabs::route('/'),
            'create' => CreateCollab::route('/create'),
            'edit' => EditCollab::route('/{record}/edit'),
        ];
    }
}