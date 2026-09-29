<?php

namespace App\Filament\Widgets;

use App\Models\AnakAsuh;
use Filament\Widgets\ChartWidget;

class TingkatPendidikanChart extends ChartWidget
{
    protected ?string $heading = 'Status Jenjang Pendidikan Anak Asuh';
    protected static ?int $sort = 6;

    // protected int|string|array $columnSpan = [
    //     'default' => 12,
    //     'md' => 6,
    // ];

    protected function getData(): array
    {
        $anakList = AnakAsuh::query()
            ->where('status_aktif', true)
            ->with('monitoringPendidikanTerbaru')
            ->get();

        $counts = [];

        foreach ($anakList as $anak) {
            $jenjang = $anak->monitoringPendidikanTerbaru?->jenjang_pendidikan ?: 'Belum Diisi';
            $counts[$jenjang] = ($counts[$jenjang] ?? 0) + 1;
        }

        $labels = array_keys($counts);
        $values = array_values($counts);

        if (empty($labels)) {
            $labels = ['Belum ada data'];
            $values = [0];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Anak',
                    'data' => $values,
                    'backgroundColor' => '#8b5cf6', // purple
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
