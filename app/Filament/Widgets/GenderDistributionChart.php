<?php

namespace App\Filament\Widgets;

use App\Models\AnakAsuh;
use Filament\Widgets\ChartWidget;

class GenderDistributionChart extends ChartWidget
{
    protected ?string $heading = 'Sebaran Gender Anak Asuh';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $lakiLaki = AnakAsuh::where('status_aktif', true)->where('jenis_kelamin', 'L')->count();
        $perempuan = AnakAsuh::where('status_aktif', true)->where('jenis_kelamin', 'P')->count();

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
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
