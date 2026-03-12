<?php

namespace App\Filament\Admin\Resources\ActivityLog;

use App\Filament\Admin\Resources\ActivityLog\Pages\ListActivityLog;
use App\Filament\Admin\Resources\ActivityLog\Pages\ViewActivityLog;
use App\Models\ActivityLog;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Filament\Admin\Resources\ActivityLog\Tables\ActivityLogTable;
use Illuminate\Database\Eloquent\Model;
use BackedEnum;

class ActivityLogResource extends Resource
{
    protected static ?string $model = ActivityLog::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static ?string $navigationLabel = 'Log Activity';
    protected static ?string $modelLabel = 'Log Activity';
    protected static ?string $pluralModelLabel = 'Log Activity';

    protected static ?string $recordTitleAttribute = 'description';

    public static function canAccess(): bool
    {
        // Hanya super admin yang bisa mengakses log activity
        return auth()->user()?->isSuperAdmin() ?? false;
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return ActivityLogTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListActivityLog::route('/'),
            'view' => ViewActivityLog::route('/{record}'),
        ];
    }
}
