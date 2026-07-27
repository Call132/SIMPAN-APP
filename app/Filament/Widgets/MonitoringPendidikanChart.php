<?php

namespace App\Filament\Widgets;

use App\Models\MonitoringPendidikan;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class MonitoringPendidikanChart extends ChartWidget
{
    protected ?string $heading = 'Perkembangan Akademik (Rata-rata Nilai Anak Asuh)';
    protected static ?int $sort = 5;
    
    // Set column span to half width (on larger screens)
    // protected int|string|array $columnSpan = [
    //     'default' => 12,
    //     'md' => 6,
    // ];

    protected function getData(): array
    {
        $records = MonitoringPendidikan::select(
                'tahun_ajaran',
                'semester',
                DB::raw('AVG(nilai_rata_rata) as avg_nilai')
            )
            ->groupBy('tahun_ajaran', 'semester')
            ->orderBy('tahun_ajaran', 'asc')
            ->orderBy('semester', 'asc')
            ->get();

        $labels = [];
        $values = [];

        foreach ($records as $record) {
            $labels[] = "{$record->tahun_ajaran} ({$record->semester})";
            $values[] = round($record->avg_nilai, 2);
        }

        // If empty, supply placeholder data
        if (empty($labels)) {
            $labels = ['Belum ada data'];
            $values = [0];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Rata-rata Nilai',
                    'data' => $values,
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                    'borderColor' => '#3b82f6',
                    'fill' => true,
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
