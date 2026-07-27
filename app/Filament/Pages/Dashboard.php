<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\DonasiChart;
use App\Filament\Widgets\GenderDistributionChart;
use App\Filament\Widgets\PerkembanganAnakWidget;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\MonitoringPendidikanChart;
use App\Filament\Widgets\TingkatPendidikanChart;
use App\Filament\Widgets\AktivitasKesehatanChart;
use App\Filament\Widgets\MonitoringKesehatanChart;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Dashboard';

    protected static ?string $navigationLabel = 'Dashboard';

    public function getWidgets(): array
    {
        return [
            StatsOverview::class,
            DonasiChart::class,
            GenderDistributionChart::class,
            MonitoringPendidikanChart::class,
            TingkatPendidikanChart::class,
            AktivitasKesehatanChart::class,
            MonitoringKesehatanChart::class,
            PerkembanganAnakWidget::class,
        ];
    }

    public function getTitle(): string
    {
        return 'Dashboard';
    }

    public static function getNavigationLabel(): string
    {
        return 'Dashboard';
    }
}
