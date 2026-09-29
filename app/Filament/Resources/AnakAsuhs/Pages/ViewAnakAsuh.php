<?php

namespace App\Filament\Resources\AnakAsuhs\Pages;

use App\Filament\Resources\AnakAsuhs\AnakAsuhResource;
use App\Models\AnakAsuh;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewAnakAsuh extends ViewRecord
{
    protected static string $resource = AnakAsuhResource::class;

    public function getMaxContentWidth(): ?string
    {
        return 'full';
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('tambahMonitoring')
                ->label('Tambah Observasi')
                ->icon('heroicon-o-plus-circle')
                ->color('primary')
                ->visible(fn (): bool => auth()->user()?->hasRole(['admin', 'pengurus', 'pengasuh']) ?? false)
                ->modalHeading('Tambah Catatan Observasi Harian')
                ->form([
                    DatePicker::make('tanggal')
                        ->label('Tanggal Observasi')
                        ->default(now())
                        ->required(),
                    Textarea::make('catatan')
                        ->label('Catatan Observasi')
                        ->rows(4)
                        ->required(),
                ])
                ->action(function (array $data): void {
                    /** @var AnakAsuh $record */
                    $record = $this->getRecord();
                    $record->monitorings()->create($data);

                    Notification::make()
                        ->title('Catatan observasi berhasil disimpan')
                        ->success()
                        ->send();
                }),

            Action::make('updatePendidikan')
                ->label('Update Pendidikan')
                ->icon('heroicon-o-academic-cap')
                ->color('info')
                ->visible(fn (): bool => auth()->user()?->hasRole(['admin', 'pengurus', 'pengasuh']) ?? false)
                ->modalHeading('Update Rekam Akademik / Pendidikan')
                ->fillForm(function (): array {
                    /** @var AnakAsuh $record */
                    $record = $this->getRecord();
                    $terbaru = $record->monitoringPendidikanTerbaru;

                    return [
                        'tahun_ajaran' => $terbaru?->tahun_ajaran ?? '2025/2026',
                        'semester' => $terbaru?->semester ?? 'Ganjil',
                        'nama_sekolah' => $terbaru?->nama_sekolah ?? $record->nama_sekolah,
                        'kelas' => $terbaru?->kelas ?? $record->kelas,
                        'nilai_rata_rata' => $terbaru?->nilai_rata_rata,
                        'persentase_kehadiran' => $terbaru?->persentase_kehadiran,
                        'prestasi' => $terbaru?->prestasi,
                        'catatan_guru' => $terbaru?->catatan_guru,
                        'tanggal_input' => now()->toDateString(),
                    ];
                })
                ->form([
                    TextInput::make('tahun_ajaran')
                        ->label('Tahun Ajaran')
                        ->placeholder('Contoh: 2025/2026')
                        ->required(),
                    Select::make('semester')
                        ->label('Semester')
                        ->options([
                            'Ganjil' => 'Ganjil',
                            'Genap' => 'Genap',
                        ])
                        ->required(),
                    TextInput::make('nama_sekolah')
                        ->label('Nama Sekolah'),
                    TextInput::make('kelas')
                        ->label('Kelas'),
                    TextInput::make('nilai_rata_rata')
                        ->label('Nilai Rata-rata')
                        ->numeric(),
                    TextInput::make('persentase_kehadiran')
                        ->label('Persentase Kehadiran (%)')
                        ->numeric(),
                    DatePicker::make('tanggal_input')
                        ->label('Tanggal Input')
                        ->default(now())
                        ->required(),
                    Textarea::make('prestasi')
                        ->label('Prestasi'),
                    Textarea::make('catatan_guru')
                        ->label('Catatan Guru / Wali Kelas')
                        ->rows(3),
                ])
                ->action(function (array $data): void {
                    /** @var AnakAsuh $record */
                    $record = $this->getRecord();
                    $record->monitoringPendidikans()->updateOrCreate(
                        [
                            'tahun_ajaran' => $data['tahun_ajaran'],
                            'semester' => $data['semester'],
                        ],
                        $data
                    );

                    Notification::make()
                        ->title('Data pendidikan berhasil diperbarui')
                        ->success()
                        ->send();
                }),

            Action::make('updateKesehatan')
                ->label('Update Kesehatan')
                ->icon('heroicon-o-heart')
                ->color('success')
                ->visible(fn (): bool => auth()->user()?->hasRole(['admin', 'pengurus', 'pengasuh']) ?? false)
                ->modalHeading('Update Rekam Medis / Kesehatan')
                ->fillForm(function (): array {
                    /** @var AnakAsuh $record */
                    $record = $this->getRecord();
                    $terbaru = $record->monitoringKesehatanTerbaru;

                    return [
                        'tanggal_pemeriksaan' => now()->toDateString(),
                        'tinggi_badan' => $terbaru?->tinggi_badan ?? $record->tinggi_badan,
                        'berat_badan' => $terbaru?->berat_badan ?? $record->berat_badan,
                        'lingkar_kepala' => $terbaru?->lingkar_kepala,
                        'status_gizi' => $terbaru?->status_gizi ?? 'Baik',
                        'nama_pemeriksa' => $terbaru?->nama_pemeriksa,
                        'diagnosis' => $terbaru?->diagnosis,
                        'keluhan' => $terbaru?->keluhan,
                        'tindakan' => $terbaru?->tindakan,
                        'catatan_tambahan' => $terbaru?->catatan_tambahan ?? $record->catatan_kesehatan_lain,
                    ];
                })
                ->form([
                    DatePicker::make('tanggal_pemeriksaan')
                        ->label('Tanggal Pemeriksaan')
                        ->default(now())
                        ->required(),
                    TextInput::make('tinggi_badan')
                        ->label('Tinggi Badan (cm)')
                        ->numeric(),
                    TextInput::make('berat_badan')
                        ->label('Berat Badan (kg)')
                        ->numeric(),
                    TextInput::make('lingkar_kepala')
                        ->label('Lingkar Kepala (cm)')
                        ->numeric(),
                    Select::make('status_gizi')
                        ->label('Status Gizi')
                        ->options([
                            'Baik' => 'Baik',
                            'Kurang' => 'Kurang',
                            'Buruk' => 'Buruk',
                            'Lebih' => 'Lebih',
                        ]),
                    TextInput::make('nama_pemeriksa')
                        ->label('Pemeriksa / Dokter'),
                    TextInput::make('diagnosis')
                        ->label('Diagnosis'),
                    Textarea::make('keluhan')
                        ->label('Keluhan / Gejala'),
                    Textarea::make('tindakan')
                        ->label('Tindakan / Resep Obat'),
                    Textarea::make('catatan_tambahan')
                        ->label('Catatan Tambahan'),
                ])
                ->action(function (array $data): void {
                    /** @var AnakAsuh $record */
                    $record = $this->getRecord();
                    $record->monitoringKesehatans()->create($data);

                    Notification::make()
                        ->title('Data kesehatan berhasil diperbarui')
                        ->success()
                        ->send();
                }),
        ];
    }
}
