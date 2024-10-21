<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Pelatihan;
use App\Models\User;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Jumlah pengguna terdaftar')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Total Pelatihan', Pelatihan::count())
                ->description('Jumlah pelatihan')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('primary'),
            Stat::make('Pelatihan Aktif', Pelatihan::where('status', 'active')->count())
                ->description('Jumlah pelatihan aktif')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('info'),
            Stat::make('Pelatihan Bulan Ini', Pelatihan::whereMonth('start_date', now()->month)->count())
                ->description('Jumlah pelatihan bulan ini')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('warning'),
        ];
    }
}