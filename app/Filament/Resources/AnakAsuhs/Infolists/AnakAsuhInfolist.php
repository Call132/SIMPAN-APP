<?php

namespace App\Filament\Resources\AnakAsuhs\Infolists;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class AnakAsuhInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Area Kiri: Profil Anak Asuh + Tab Perkembangan (8 kolom di desktop)
                Group::make([
                    Section::make('Profil Anak Asuh')
                        ->icon('heroicon-o-user')
                        ->columns(12)
                        ->schema([
                            ImageEntry::make('foto')
                                ->hiddenLabel()
                                ->circular()
                                ->defaultImageUrl('https://ui-avatars.com/api/?name=Anak+Asuh&color=7F9CF5&background=EBF4FF')
                                ->extraAttributes(['class' => 'flex justify-center md:justify-start'])
                                ->columnSpan(['default' => 12, 'sm' => 4]),

                            Group::make([
                                TextEntry::make('nama_lengkap')
                                    ->label('Nama Lengkap')
                                    ->placeholder('-'),
                                TextEntry::make('nama_panggilan')
                                    ->label('Nama Panggilan')
                                    ->placeholder('-'),
                                TextEntry::make('jenis_kelamin')
                                    ->label('Jenis Kelamin')
                                    ->formatStateUsing(fn ($state) => $state === 'L' ? 'Laki-laki' : ($state === 'P' ? 'Perempuan' : '-'))
                                    ->placeholder('-'),
                                TextEntry::make('tanggal_lahir')
                                    ->label('Tanggal Lahir')
                                    ->date('d F Y')
                                    ->placeholder('-'),
                                TextEntry::make('tempat_lahir')
                                    ->label('Tempat Lahir')
                                    ->placeholder('-'),
                                IconEntry::make('status_aktif')
                                    ->label('Status Aktif')
                                    ->boolean(),
                                TextEntry::make('agama')
                                    ->label('Agama')
                                    ->placeholder('-'),
                            ])
                            ->columns(2)
                            ->columnSpan(['default' => 12, 'sm' => 8]),

                            TextEntry::make('alamat_asal')
                                ->label('Alamat Asal')
                                ->placeholder('-')
                                ->columnSpanFull(),
                            TextEntry::make('keterangan_masuk')
                                ->label('Keterangan / Alasan Masuk Panti')
                                ->placeholder('-')
                                ->columnSpanFull(),
                        ]),

                    Tabs::make('Kategori Perkembangan')
                        ->tabs([
                            Tabs\Tab::make('Pendidikan')
                                ->icon('heroicon-o-academic-cap')
                                ->schema([
                                    Group::make([
                                        TextEntry::make('monitoringPendidikanTerbaru.tahun_ajaran')
                                            ->label('Tahun Ajaran')
                                            ->placeholder('Belum ada data'),
                                        TextEntry::make('monitoringPendidikanTerbaru.semester')
                                            ->label('Semester')
                                            ->placeholder('Belum ada data'),
                                        TextEntry::make('monitoringPendidikanTerbaru.nama_sekolah')
                                            ->label('Nama Sekolah')
                                            ->placeholder('Belum ada data'),
                                        TextEntry::make('monitoringPendidikanTerbaru.kelas')
                                            ->label('Kelas')
                                            ->placeholder('Belum ada data'),
                                        TextEntry::make('monitoringPendidikanTerbaru.nilai_rata_rata')
                                            ->label('Nilai Rata-rata')
                                            ->placeholder('Belum ada data'),
                                        TextEntry::make('monitoringPendidikanTerbaru.persentase_kehadiran')
                                            ->label('Kehadiran')
                                            ->formatStateUsing(fn ($state) => $state !== null ? "{$state}%" : null)
                                            ->placeholder('Belum ada data'),
                                    ])->columns(3),

                                    TextEntry::make('monitoringPendidikanTerbaru.prestasi')
                                        ->label('Prestasi')
                                        ->placeholder('Belum ada data')
                                        ->columnSpanFull(),

                                    TextEntry::make('monitoringPendidikanTerbaru.catatan_guru')
                                        ->label('Catatan Guru / Wali Kelas')
                                        ->placeholder('Belum ada data')
                                        ->columnSpanFull(),
                                ]),

                            Tabs\Tab::make('Kesehatan')
                                ->icon('heroicon-o-heart')
                                ->schema([
                                    Group::make([
                                        TextEntry::make('monitoringKesehatanTerbaru.tanggal_pemeriksaan')
                                            ->label('Tanggal Pemeriksaan')
                                            ->date('d F Y')
                                            ->placeholder('Belum ada data'),
                                        TextEntry::make('monitoringKesehatanTerbaru.status_gizi')
                                            ->label('Status Gizi')
                                            ->badge()
                                            ->placeholder('Belum ada data'),
                                        TextEntry::make('monitoringKesehatanTerbaru.nama_pemeriksa')
                                            ->label('Pemeriksa / Dokter')
                                            ->placeholder('Belum ada data'),
                                    ])->columns(3),

                                    Group::make([
                                        TextEntry::make('monitoringKesehatanTerbaru.tinggi_badan')
                                            ->label('Tinggi Badan')
                                            ->formatStateUsing(fn ($state) => $state ? "{$state} cm" : null)
                                            ->placeholder('Belum ada data'),
                                        TextEntry::make('monitoringKesehatanTerbaru.berat_badan')
                                            ->label('Berat Badan')
                                            ->formatStateUsing(fn ($state) => $state ? "{$state} kg" : null)
                                            ->placeholder('Belum ada data'),
                                        TextEntry::make('monitoringKesehatanTerbaru.lingkar_kepala')
                                            ->label('Lingkar Kepala')
                                            ->formatStateUsing(fn ($state) => $state ? "{$state} cm" : null)
                                            ->placeholder('Belum ada data'),
                                    ])->columns(3),

                                    TextEntry::make('monitoringKesehatanTerbaru.diagnosis')
                                        ->label('Diagnosis')
                                        ->placeholder('Belum ada data')
                                        ->columnSpanFull(),

                                    Group::make([
                                        TextEntry::make('monitoringKesehatanTerbaru.keluhan')
                                            ->label('Keluhan / Gejala')
                                            ->placeholder('Belum ada data'),
                                        TextEntry::make('monitoringKesehatanTerbaru.tindakan')
                                            ->label('Tindakan / Resep Obat')
                                            ->placeholder('Belum ada data'),
                                    ])->columns(2),

                                    TextEntry::make('monitoringKesehatanTerbaru.catatan_tambahan')
                                        ->label('Catatan Tambahan')
                                        ->placeholder('Belum ada data')
                                        ->columnSpanFull(),
                                ]),
                        ]),
                ])->columnSpan(['default' => 12, 'lg' => 8]),

                // Area Kanan: Timeline Riwayat Monitoring (4 kolom di desktop)
                Group::make([
                    Section::make('Riwayat Observasi Harian')
                        ->icon('heroicon-o-clock')
                        ->schema([
                            ViewEntry::make('monitorings')
                                ->hiddenLabel()
                                ->view('filament.infolists.timeline'),
                        ]),
                ])->columnSpan(['default' => 12, 'lg' => 4]),
            ]);
    }
}
