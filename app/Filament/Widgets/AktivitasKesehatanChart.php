<?php

namespace App\Filament\Widgets;

use App\Models\MonitoringKesehatan;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AktivitasKesehatanChart extends ChartWidget
{
    protected ?string $heading = 'Aktivitas Pemeriksaan Kesehatan (6 Bulan Terakhir)';
    protected static ?int $sort = 7;

    // protected int|string|array $columnSpan = [
    //     'default' => 12,
    //     'md' => 6,
    // ];

    protected function getData(): array
    {
        $data = MonitoringKesehatan::select(
                DB::raw("DATE_FORMAT(tanggal_pemeriksaan, '%Y-%m') as bulan"),
                DB::raw('count(*) as total')
            )
            ->where('tanggal_pemeriksaan', '>=', Carbon::now()->subMonths(5)->startOfMonth())
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
                    'label' => 'Jumlah Pemeriksaan',
                    'data' => $values,
                    'backgroundColor' => '#06b6d4', // cyan
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
