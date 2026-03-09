<?php

namespace App\Filament\Admin\Resources\ActivityLog\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Actions;
use Illuminate\Database\Eloquent\Builder;

class ActivityLogTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal & Waktu')
                    ->dateTime('d M Y H:i:s')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('action')
                    ->label('Aksi')
                    ->colors([
                        'success' => 'create',
                        'info' => 'update',
                        'danger' => 'delete',
                        'warning' => 'login',
                        'gray' => 'logout',
                        'primary' => 'view',
                    ])
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
                    }),

                Tables\Columns\TextColumn::make('model_name')
                    ->label('Target')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->wrap(),

                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->copyable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('action')
                    ->label('Aksi')
                    ->options([
                        'create' => 'Menambah',
                        'update' => 'Mengubah',
                        'delete' => 'Menghapus',
                        'login' => 'Login',
                        'logout' => 'Logout',
                        'view' => 'Melihat',
                    ]),

                Tables\Filters\SelectFilter::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->searchable(),

                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function ($query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'] ?? null,
                                fn ($q) => $q->whereDate('created_at', '>=', $data['created_from'])
                            )
                            ->when(
                                $data['created_until'] ?? null,
                                fn ($q) => $q->whereDate('created_at', '<=', $data['created_until'])
                            );
                    }),
            ])
            ->actions([
                Actions\Action::make('view')
                    ->label('Lihat Detail')
                    ->icon('heroicon-o-eye')
                    ->url(fn ($record) => route('filament.admin.resources.activity-log.activity-logs.view', $record))
                    ->openUrlInNewTab(false),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated([10, 25, 50, 100]);
    }
}
