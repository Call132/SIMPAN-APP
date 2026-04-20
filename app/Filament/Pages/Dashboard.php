<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\DonasiChart;
use App\Filament\Widgets\GenderDistributionChart;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            StatsOverview::class,
            DonasiChart::class,
            GenderDistributionChart::class,
        ];
    }
}
