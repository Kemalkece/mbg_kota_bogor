<?php

namespace App\Filament\Admin\Pages;

use Filament\Actions\Action;
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
        $files = Storage::disk('local')->files('Laravel');
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

        return $table
            ->records(fn() => collect($backups)->sortByDesc('raw_date')->values())
            ->modelLabel('Data Backup')
            ->pluralModelLabel('Daftar Backup Data & Database')
            ->columns([
                TextColumn::make('name')
                    ->label('Identitas File')
                    ->icon('heroicon-o-document-duplicate')
                    ->iconColor('primary')
                    ->weight('bold')
                    ->searchable(),
                TextColumn::make('size')
                    ->label('Ukuran File')
                    ->badge()
                    ->color('gray'),
                TextColumn::make('date')
                    ->label('Dibuat Pada')
                    ->description(fn($record) => 'Tersimpan secara lokal di server')
                    ->since(),
            ])
            ->actions([
                Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-m-arrow-down-tray')
                    ->action(fn ($record) => $this->downloadBackup($record['path'])),
                Action::make('delete')
                    ->label('Hapus')
                    ->icon('heroicon-m-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $this->deleteBackup($record['path']);
                    }),
            ])
            ->emptyStateHeading('Belum ada riwayat backup')
            ->emptyStateDescription('Silakan klik tombol "Jalankan Backup" untuk membuat cadangan pertama.');
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
