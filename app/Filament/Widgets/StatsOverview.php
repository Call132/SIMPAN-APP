<?php

namespace App\Filament\Widgets;

use App\Models\AnakAsuh;
use App\Models\Donasi;
use App\Models\Donatur;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        $stats = Cache::remember('dashboard_stats_overview', 60, function () {
            $anakStats = AnakAsuh::where('status_aktif', true)
                ->selectRaw('count(*) as total, sum(case when jenis_kelamin = "L" then 1 else 0 end) as laki, sum(case when jenis_kelamin = "P" then 1 else 0 end) as perempuan')
                ->first();

            $donasiBulanIni = Donasi::where('jenis_donasi', 'uang')
                ->whereMonth('tanggal_donasi', Carbon::now()->month)
                ->whereYear('tanggal_donasi', Carbon::now()->year)
                ->sum('jumlah_uang');

            $totalDonaturAktif = Donatur::where('status_aktif', true)->count();

            return [
                'totalAnakAsuh' => (int) ($anakStats->total ?? 0),
                'lakiLaki' => (int) ($anakStats->laki ?? 0),
                'perempuan' => (int) ($anakStats->perempuan ?? 0),
                'donasiBulanIni' => (float) ($donasiBulanIni ?? 0),
                'totalDonaturAktif' => (int) ($totalDonaturAktif ?? 0),
            ];
        });

        return [
            Stat::make('Total Anak Asuh', $stats['totalAnakAsuh'])
                ->description("Laki-laki: {$stats['lakiLaki']} | Perempuan: {$stats['perempuan']}")
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),
            Stat::make('Donasi Uang Bulan Ini', 'Rp ' . number_format($stats['donasiBulanIni'], 0, ',', '.'))
                ->description('Total donasi uang masuk di bulan ini')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('success'),
            Stat::make('Total Donatur Aktif', $stats['totalDonaturAktif'])
                ->description('Penyumbang aktif')
                ->descriptionIcon('heroicon-o-heart')
                ->color('info'),
        ];
    }
}
