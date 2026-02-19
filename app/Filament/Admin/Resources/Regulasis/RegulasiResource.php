<?php

namespace App\Filament\Admin\Resources\Regulasis;

use App\Filament\Admin\Resources\Regulasis\Pages\CreateRegulasi;
use App\Filament\Admin\Resources\Regulasis\Pages\EditRegulasi;
use App\Filament\Admin\Resources\Regulasis\Pages\ListRegulasis;
use App\Filament\Admin\Resources\Regulasis\Schemas\RegulasiForm;
use App\Filament\Admin\Resources\Regulasis\Tables\RegulasisTable;
use App\Models\Regulasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RegulasiResource extends Resource
{
    protected static ?string $model = Regulasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'regulasi';

    public static function form(Schema $schema): Schema
    {
        return RegulasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RegulasisTable::configure($table);
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
            'index' => ListRegulasis::route('/'),
            'create' => CreateRegulasi::route('/create'),
            'edit' => EditRegulasi::route('/{record}/edit'),
        ];
    }
}
