<?php

namespace App\Filament\Admin\Resources\FAQ;

use App\Filament\Admin\Resources\FAQ\Pages\CreateFAQ;
use App\Filament\Admin\Resources\FAQ\Pages\EditFAQ;
use App\Filament\Admin\Resources\FAQ\Pages\ListFAQ;
use App\Filament\Admin\Resources\FAQ\Schemas\FAQForm;
use App\Filament\Admin\Resources\FAQ\Tables\FAQTable;
use App\Models\FAQ;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FAQResource extends Resource
{
    protected static ?string $model = FAQ::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedQuestionMarkCircle;

    // 🔥 INI YANG BIKIN TIDAK ADA "S"
    protected static ?string $navigationLabel = 'FAQ';
    protected static ?string $modelLabel = 'FAQ';
    protected static ?string $pluralModelLabel = 'FAQ';

    protected static ?string $recordTitleAttribute = 'pertanyaan';

    public static function form(Schema $schema): Schema
    {
        return FAQForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FAQTable::configure($table);
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
            'index' => ListFAQ::route('/'),
            'create' => CreateFAQ::route('/create'),
            'edit' => EditFAQ::route('/{record}/edit'),
        ];
    }
}
