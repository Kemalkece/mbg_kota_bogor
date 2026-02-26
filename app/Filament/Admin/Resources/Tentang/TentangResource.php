<?php

namespace App\Filament\Admin\Resources\Tentang;

use App\Filament\Admin\Resources\Tentang\Pages\CreateTentang;
use App\Filament\Admin\Resources\Tentang\Pages\EditTentang;
use App\Filament\Admin\Resources\Tentang\Pages\ListTentang;
use App\Filament\Admin\Resources\Tentang\Pages\ViewTentang;
use App\Filament\Admin\Resources\Tentang\Schemas\TentangForm;
use App\Filament\Admin\Resources\Tentang\Schemas\TentangInfolist;
use App\Filament\Admin\Resources\Tentang\Tables\TentangTable;
use App\Models\Tentang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TentangResource extends Resource
{
    protected static ?string $model = Tentang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Tentang';

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
    {
        return TentangForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TentangInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TentangTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTentang::route('/'),
            'create' => CreateTentang::route('/create'),
            'Lihat' => ViewTentang::route('/{record}'),
            'edit' => EditTentang::route('/{record}/edit'),
        ];
    }
}
