<?php

namespace App\Filament\Admin\Resources\DataPenyalurans;

use App\Filament\Admin\Resources\DataPenyalurans\Pages\CreateDataPenyaluran;
use App\Filament\Admin\Resources\DataPenyalurans\Pages\EditDataPenyaluran;
use App\Filament\Admin\Resources\DataPenyalurans\Pages\ListDataPenyalurans;
use App\Filament\Admin\Resources\DataPenyalurans\Schemas\DataPenyaluranForm;
use App\Filament\Admin\Resources\DataPenyalurans\Tables\DataPenyaluransTable;
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

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Data Penyaluran';

    protected static ?string $pluralLabel = 'Data Penyaluran';

    public static function form(Schema $schema): Schema
    {
        return DataPenyaluranForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataPenyaluransTable::configure($table);
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
            'index' => ListDataPenyalurans::route('/'),
            'create' => CreateDataPenyaluran::route('/create'),
            'edit' => EditDataPenyaluran::route('/{record}/edit'),
        ];
    }
}
