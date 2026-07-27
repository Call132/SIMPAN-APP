<?php

namespace App\Filament\Widgets;

use App\Models\AnakAsuh;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

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
        $records = AnakAsuh::select('tingkat_pendidikan', DB::raw('count(*) as total'))
            ->where('status_aktif', true)
            ->groupBy('tingkat_pendidikan')
            ->get();

        $labels = [];
        $values = [];

        foreach ($records as $record) {
            $labels[] = $record->tingkat_pendidikan ?: 'Belum Diisi';
            $values[] = $record->total;
        }

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
