<?php

namespace App\Filament\Admin\Resources\Abouts;

use App\Filament\Admin\Resources\Abouts\Pages\CreateAbout;
use App\Filament\Admin\Resources\Abouts\Pages\EditAbout;
use App\Filament\Admin\Resources\Abouts\Pages\ListAbouts;
use App\Filament\Admin\Resources\Abouts\Pages\ViewAbout;
use App\Filament\Admin\Resources\Abouts\Schemas\AboutForm;
use App\Filament\Admin\Resources\Abouts\Schemas\AboutInfolist;
use App\Filament\Admin\Resources\Abouts\Tables\AboutsTable;
use App\Models\About;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    // Ganti label sidebar
    protected static ?string $navigationLabel = 'About';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return AboutForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AboutInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAbouts::route('/'),
            'create' => CreateAbout::route('/create'),
            'Lihat' => ViewAbout::route('/{record}'),
            'edit' => EditAbout::route('/{record}/edit'),
        ];
    }
}