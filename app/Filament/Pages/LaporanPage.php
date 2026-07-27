<?php

namespace App\Filament\Pages;

use App\Models\AnakAsuh;
use App\Models\LaporanLog;
use BackedEnum;
use Filament\Pages\Page;
use UnitEnum;

class LaporanPage extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-chart-bar';

    protected static UnitEnum|string|null $navigationGroup = 'Laporan';

    protected static ?string $navigationLabel = 'Cetak Laporan';

    protected static ?string $title = 'Pusat Laporan & Cetak PDF';

    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.laporan-page';

    public function getViewData(): array
    {
        $logJenis = request('log_jenis', 'semua');

        $logQuery = LaporanLog::with('user');

        if ($logJenis !== 'semua') {
            $logQuery->where('jenis_laporan', $logJenis);
        }

        return [
            'anakList' => AnakAsuh::where('status_aktif', true)->orderBy('nama_lengkap', 'asc')->get(),
            'laporanLogs' => $logQuery->orderBy('created_at', 'desc')->paginate(10)->withQueryString(),
            'logJenis' => $logJenis,
        ];
    }
}
