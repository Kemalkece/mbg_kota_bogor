<?php

namespace App\Filament\Admin\Resources\ActivityLog\Pages;

use App\Filament\Admin\Resources\ActivityLog\ActivityLogResource;
use Filament\Actions;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;

class ViewActivityLog extends ViewRecord
{
    protected static string $resource = ActivityLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Kembali')
                ->url(static::getResource()::getUrl('index'))
                ->color('gray'),
        ];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('created_at')
                    ->label('Tanggal & Waktu')
                    ->dateTime('d M Y H:i:s'),
                TextEntry::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i:s'),
                    
                TextEntry::make('user.name')
                    ->label('Nama User'),
                TextEntry::make('user.email')
                    ->label('Email User'),
                TextEntry::make('user.role')
                    ->label('Role User')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'super_admin' => 'Super Admin',
                        'admin' => 'Admin',
                        default => ucfirst($state),
                    }),
                    
                TextEntry::make('action')
                    ->label('Jenis Aksi')
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'create' => 'Menambah',
                            'update' => 'Mengubah',
                            'delete' => 'Menghapus',
                            'login' => 'Login',
                            'logout' => 'Logout',
                            'view' => 'Melihat',
                            'download' => 'Download',
                            'export' => 'Export',
                            'import' => 'Import',
                            default => ucfirst($state),
                        };
                    })
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'create' => 'success',
                        'update' => 'info',
                        'delete' => 'danger',
                        'login' => 'warning',
                        'logout' => 'gray',
                        'view' => 'primary',
                        default => 'secondary',
                    }),
                TextEntry::make('model_name')
                    ->label('Target/Model'),
                TextEntry::make('model_type')
                    ->label('Tipe Model'),
                TextEntry::make('model_id')
                    ->label('ID Target'),
                    
                TextEntry::make('description')
                    ->label('Deskripsi Lengkap')
                    ->columnSpanFull(),
                    
                TextEntry::make('changes')
                    ->label('Data yang Berubah')
                    ->formatStateUsing(function ($state) {
                        if (!$state) {
                            return '-';
                        }
                        return json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                    })
                    ->columnSpanFull(),
                    
                TextEntry::make('ip_address')
                    ->label('IP Address')
                    ->copyable(),
                TextEntry::make('user_agent')
                    ->label('User Agent')
                    ->columnSpanFull(),
            ]);
    }
}
