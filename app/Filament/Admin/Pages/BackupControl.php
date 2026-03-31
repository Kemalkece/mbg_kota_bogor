<?php

namespace App\Filament\Admin\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BackupControl extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cloud-arrow-up';
    protected static ?string $navigationLabel = 'Backup Data & Database';
    protected static ?string $title = 'Manajemen Backup Data & Sistem';
    protected static string | \UnitEnum | null $navigationGroup = 'Sistem';

    protected string $view = 'filament.admin.pages.backup-control';

    public static function canAccess(): bool
    {
        /** @var \App\Models\User|null $user */
        $user = auth()->user();
        return $user?->isSuperAdmin() ?? false;
    }

    public function table(Table $table): Table
    {
        return $table
            ->records(function () {
                $folder = config('backup.backup.name', env('APP_NAME', 'Laravel'));
                $files = Storage::disk('local')->files($folder);
                $backups = [];

                foreach ($files as $file) {
                    if (str_ends_with($file, '.zip')) {
                        $sizeInBytes = Storage::disk('local')->size($file);
                        $sizeDisplay = $sizeInBytes < 1024 * 100
                            ? round($sizeInBytes / 1024, 2) . ' KB'
                            : round($sizeInBytes / 1024 / 1024, 2) . ' MB';

                        $backups[] = [
                            'id' => $file,
                            'path' => $file,
                            'name' => basename($file),
                            'size' => $sizeDisplay,
                            'date' => date('Y-m-d H:i:s', Storage::disk('local')->lastModified($file)),
                            'raw_date' => Storage::disk('local')->lastModified($file),
                        ];
                    }
                }

                return collect($backups)->sortByDesc('raw_date')->values();
            })
            ->modelLabel('Data Backup')
            ->pluralModelLabel('Daftar Backup Data & Database')
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Arsip')
                    ->icon('heroicon-o-archive-box')
                    ->iconColor('primary')
                    ->weight('medium')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->grow()
                    ->extraHeaderAttributes(['style' => 'width: 100%']),
                TextColumn::make('size')
                    ->label('Ukuran')
                    ->badge()
                    ->color('gray')
                    ->alignCenter(),
                TextColumn::make('date')
                    ->label('Tanggal Backup')
                    ->since()
                    ->sortable()
                    ->alignEnd(),
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('download')
                        ->label('Unduh')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->color('primary')
                        ->action(fn($record) => $this->downloadBackup($record['path'])),
                    Action::make('delete')
                        ->label('Hapus')
                        ->icon('heroicon-o-trash')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->modalHeading('Hapus Cadangan?')
                        ->modalDescription('File ini akan dihapus permanen dari server.')
                        ->action(function ($record) {
                            $this->deleteBackup($record['path']);
                            return redirect(static::getUrl());
                        }),
                ])
                    ->icon('heroicon-m-ellipsis-horizontal')
                    ->size('sm')
                    ->color('gray')
                    ->button()
            ])
            ->actionsAlignment('right')
            ->emptyStateHeading('Riwayat Backup Kosong')
            ->emptyStateDescription('Belum ada file cadangan yang tersimpan di server.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('runBackup')
                ->label('Jalankan Backup Sekarang')
                ->icon('heroicon-m-play')
                ->color('success')
                ->requiresConfirmation()
                ->action(function () {
                    try {
                        Artisan::call('backup:run');
                        Notification::make()->title('Backup Berhasil!')->success()->send();
                        return redirect(static::getUrl());
                    } catch (\Exception $e) {
                        Notification::make()->title('Gagal!')->danger()->body($e->getMessage())->send();
                    }
                }),
        ];
    }

    public function downloadBackup(string $path): ?StreamedResponse
    {
        if (!Storage::disk('local')->exists($path)) {
            Notification::make()->title('File tidak ditemukan')->danger()->send();
            return null;
        }
        return Storage::disk('local')->download($path);
    }

    public function deleteBackup(string $path)
    {
        Storage::disk('local')->delete($path);
        Notification::make()->title('Berhasil dihapus')->success()->send();
    }
}
