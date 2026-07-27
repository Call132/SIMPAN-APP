<?php

namespace App\Filament\Widgets;

use App\Models\MonitoringKesehatan;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class MonitoringKesehatanChart extends ChartWidget
{
    protected ?string $heading = 'Proporsi Kondisi Kesehatan Anak (Status Gizi Terbaru)';
    protected static ?int $sort = 8;

   

    protected function getData(): array
    {
        $latestRecords = MonitoringKesehatan::select('status_gizi', DB::raw('count(*) as count'))
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('monitoring_kesehatans')
                    ->groupBy('anak_asuh_id');
            })
            ->groupBy('status_gizi')
            ->get();

        $labels = [];
        $values = [];
        $colors = [];

        $colorMap = [
            'Baik' => '#22c55e',     // success
            'Kurang' => '#f59e0b',   // warning
            'Buruk' => '#ef4444',    // danger
            'Lebih' => '#3b82f6',    // info
        ];

        foreach ($latestRecords as $record) {
            $status = $record->status_gizi ?: 'Tidak Diketahui';
            $labels[] = $status;
            $values[] = $record->count;
            $colors[] = $colorMap[$status] ?? '#94a3b8';
        }

        if (empty($labels)) {
            $labels = ['Belum ada data'];
            $values = [0];
            $colors = ['#94a3b8'];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Anak',
                    'data' => $values,
                    'backgroundColor' => $colors,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
