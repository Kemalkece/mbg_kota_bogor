<?php

namespace App\Filament\Admin\Resources\DataPenyaluran;

use App\Filament\Admin\Resources\DataPenyaluran\Pages\CreateDataPenyaluran;
use App\Filament\Admin\Resources\DataPenyaluran\Pages\EditDataPenyaluran;
use App\Filament\Admin\Resources\DataPenyaluran\Pages\ListDataPenyaluran;
use App\Filament\Admin\Resources\DataPenyaluran\Schemas\DataPenyaluranForm;
use App\Filament\Admin\Resources\DataPenyaluran\Tables\DataPenyaluranTable;
use App\Models\DataPenyaluran;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DataPenyaluranResource extends Resource
{
    protected static ?string $model = DataPenyaluran::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTableCells;

    protected static ?string $recordTitleAttribute = 'judul';

    protected static ?string $navigationLabel = 'Data Penyaluran';

    protected static ?string $pluralLabel = 'Data Penyaluran';

    public static function form(Schema $schema): Schema
    {
        return DataPenyaluranForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataPenyaluranTable::configure($table);
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
            'index' => ListDataPenyaluran::route('/'),
            'create' => CreateDataPenyaluran::route('/create'),
            'edit' => EditDataPenyaluran::route('/{record}/edit'),
        ];
    }
}
