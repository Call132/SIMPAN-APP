<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\AnakAsuhs\AnakAsuhResource;
use App\Models\AnakAsuh;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PerkembanganAnakWidget extends BaseWidget
{
    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Laporan Ringkasan Perkembangan Anak Asuh')
            ->query(
                AnakAsuh::query()
                    ->with([
                        'monitoringPendidikanTerbaru',
                        'monitoringKesehatanTerbaru',
                        'monitoringTerbaru',
                    ])
                    ->where('status_aktif', true)
            )
            ->columns([
                TextColumn::make('nama_lengkap')
                    ->label('Nama Anak')
                    ->searchable()
                    ->sortable()
                    ->description(fn (AnakAsuh $record) => $record->nama_panggilan ? "({$record->nama_panggilan})" : null),

                TextColumn::make('monitoringPendidikanTerbaru.nama_sekolah')
                    ->label('Sekolah & Kelas')
                    ->formatStateUsing(function (AnakAsuh $record) {
                        $p = $record->monitoringPendidikanTerbaru;
                        if (!$p) return '-';
                        return "{$p->nama_sekolah} - Kelas {$p->kelas}";
                    })
                    ->placeholder('-'),

                TextColumn::make('monitoringPendidikanTerbaru.nilai_rata_rata')
                    ->label('Nilai Rata-rata')
                    ->badge()
                    ->color('info')
                    ->placeholder('-'),

                TextColumn::make('monitoringKesehatanTerbaru.status_gizi')
                    ->label('Status Gizi')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'Baik' => 'success',
                        'Kurang' => 'warning',
                        'Buruk' => 'danger',
                        'Lebih' => 'info',
                        default => 'gray',
                    })
                    ->placeholder('-'),

                TextColumn::make('monitoringKesehatanTerbaru.tinggi_badan')
                    ->label('Tinggi / Berat')
                    ->formatStateUsing(function (AnakAsuh $record) {
                        $k = $record->monitoringKesehatanTerbaru;
                        if (!$k) return '-';
                        return "{$k->tinggi_badan} cm / {$k->berat_badan} kg";
                    })
                    ->placeholder('-'),

                TextColumn::make('monitoringTerbaru.catatan')
                    ->label('Observasi Terakhir')
                    ->formatStateUsing(function (AnakAsuh $record) {
                        $m = $record->monitoringTerbaru;
                        if (!$m) return '-';
                        $tgl = \Carbon\Carbon::parse($m->tanggal)->translatedFormat('d M Y');
                        return "{$tgl}: {$m->catatan}";
                    })
                    ->limit(50)
                    ->placeholder('-'),
            ])
            ->recordActions([
                Action::make('viewDetail')
                    ->label('Detail')
                    ->icon('heroicon-o-eye')
                    ->url(fn (AnakAsuh $record): string => AnakAsuhResource::getUrl('view', ['record' => $record])),
            ])
            ->paginated([5, 10, 25]);
    }
}
