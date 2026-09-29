<?php

namespace App\Filament\Widgets;

use App\Models\AnakAsuh;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Cache;

class GenderDistributionChart extends ChartWidget
{
    protected ?string $heading = 'Sebaran Gender Anak Asuh';
    protected static ?int $sort = 3;
    protected static bool $isLazy = false;

    protected function getData(): array
    {
        return Cache::remember('dashboard_chart_gender', 60, function () {
            $anakStats = AnakAsuh::where('status_aktif', true)
                ->selectRaw('sum(case when jenis_kelamin = "L" then 1 else 0 end) as laki, sum(case when jenis_kelamin = "P" then 1 else 0 end) as perempuan')
                ->first();

            $lakiLaki = (int) ($anakStats->laki ?? 0);
            $perempuan = (int) ($anakStats->perempuan ?? 0);

            return [
                'datasets' => [
                    [
                        'label' => 'Jumlah',
                        'data' => [$lakiLaki, $perempuan],
                        'backgroundColor' => ['#3b82f6', '#ec4899'],
                    ],
                ],
                'labels' => ['Laki-laki', 'Perempuan'],
            ];
        });
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
