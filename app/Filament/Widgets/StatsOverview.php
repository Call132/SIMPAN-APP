<?php

namespace App\Filament\Widgets;

use App\Models\AnakAsuh;
use App\Models\Donasi;
use App\Models\Donatur;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalAnakAsuh = AnakAsuh::where('status_aktif', true)->count();
        $lakiLaki = AnakAsuh::where('status_aktif', true)->where('jenis_kelamin', 'L')->count();
        $perempuan = AnakAsuh::where('status_aktif', true)->where('jenis_kelamin', 'P')->count();

        $donasiBulanIni = Donasi::where('jenis_donasi', 'uang')
            ->whereMonth('tanggal_donasi', Carbon::now()->month)
            ->whereYear('tanggal_donasi', Carbon::now()->year)
            ->sum('jumlah_uang');

        $totalDonaturAktif = Donatur::where('status_aktif', true)->count();

        return [
            Stat::make('Total Anak Asuh', $totalAnakAsuh)
                ->description("Laki-laki: $lakiLaki | Perempuan: $perempuan")
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),
            Stat::make('Donasi Uang Bulan Ini', 'Rp ' . number_format((float) $donasiBulanIni, 0, ',', '.'))
                ->description('Total donasi uang masuk di bulan ini')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('success'),
            Stat::make('Total Donatur Aktif', $totalDonaturAktif)
                ->description('Penyumbang aktif')
                ->descriptionIcon('heroicon-o-heart')
                ->color('info'),
        ];
    }
}
