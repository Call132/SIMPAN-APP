<?php

namespace App\Filament\Widgets;

use App\Models\Donasi;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DonasiChart extends ChartWidget
{
    protected ?string $heading = 'Donasi (6 Bulan Terakhir)';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Donasi::select(
                DB::raw("DATE_FORMAT(tanggal_donasi, '%Y-%m') as bulan"),
                DB::raw('SUM(jumlah_uang) as total')
            )
            ->where('jenis_donasi', 'uang')
            ->where('tanggal_donasi', '>=', Carbon::now()->subMonths(5)->startOfMonth())
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get()
            ->pluck('total', 'bulan')
            ->toArray();

        $labels = [];
        $values = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i)->format('Y-m');
            $labels[] = $month;
            $values[] = $data[$month] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Donasi (Rp)',
                    'data' => $values,
                    'backgroundColor' => '#22c55e',
                    'borderColor' => '#22c55e',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
