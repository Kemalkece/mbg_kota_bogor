<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Berita;
use App\Models\Collab;
use App\Models\Kolaborasi;
use App\Models\Regulasi;
use App\Models\Sasaran;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Berita', Berita::count())
                ->description('Berita terkait program MBG')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success'),
            Stat::make('Total Sasaran', Sasaran::count())
                ->description('Kelompok penerima manfaat')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
            Stat::make('Total Regulasi', Regulasi::count())
                ->description('Dokumen hukum & aturan')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('warning'),
            Stat::make('Kolaborasi', Kolaborasi::count())
                ->description('Mitra dan sinergi')
                ->descriptionIcon('heroicon-m-hand-raised')
                ->color('primary'),
        ];
    }
}
