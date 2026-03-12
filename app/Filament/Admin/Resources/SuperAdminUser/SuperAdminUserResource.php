<?php

namespace App\Filament\Admin\Resources\SuperAdminUser;

use App\Filament\Admin\Resources\SuperAdminUser\Pages\CreateSuperAdminUser;
use App\Filament\Admin\Resources\SuperAdminUser\Pages\EditSuperAdminUser;
use App\Filament\Admin\Resources\SuperAdminUser\Pages\ListSuperAdminUser;
use App\Filament\Admin\Resources\SuperAdminUser\Tables\SuperAdminUserTable;
use App\Models\User;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use BackedEnum;

class SuperAdminUserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $navigationLabel = 'Kelola Admin';
    protected static ?string $modelLabel = 'Admin';
    protected static ?string $pluralModelLabel = 'Admin';

    protected static ?string $recordTitleAttribute = 'name';

    public static function canAccess(): bool
    {
        // Hanya super admin yang bisa mengakses
        return auth()->user()?->isSuperAdmin() ?? false;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereIn('role', ['admin', 'super_admin']);
    }

    public static function table(Table $table): Table
    {
        return SuperAdminUserTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSuperAdminUser::route('/'),
            'create' => CreateSuperAdminUser::route('/create'),
            'edit' => EditSuperAdminUser::route('/{record}/edit'),
        ];
    }
}
