<?php

namespace App\Filament\Admin\Resources\Sasaran;

use App\Filament\Admin\Resources\Sasaran\Pages\CreateSasaran;
use App\Filament\Admin\Resources\Sasaran\Pages\EditSasaran;
use App\Filament\Admin\Resources\Sasaran\Pages\ListSasaran;
use App\Filament\Admin\Resources\Sasaran\Schemas\SasaranForm;
use App\Filament\Admin\Resources\Sasaran\Tables\SasaranTable;
use App\Models\Sasaran;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SasaranResource extends Resource
{
    protected static ?string $model = Sasaran::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $recordTitleAttribute = 'klasifikasi';

    // 🔥 Tambahkan ini supaya tidak jadi "Sasarans"
    protected static ?string $navigationLabel = 'Sasaran';
    protected static ?string $modelLabel = 'Sasaran';
    protected static ?string $pluralModelLabel = 'Sasaran';

    public static function form(Schema $schema): Schema
    {
        return SasaranForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SasaranTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSasaran::route('/'),
            'create' => CreateSasaran::route('/create'),
            'edit' => EditSasaran::route('/{record}/edit'),
        ];
    }
}
