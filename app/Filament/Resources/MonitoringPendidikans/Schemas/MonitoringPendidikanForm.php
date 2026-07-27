<?php

namespace App\Filament\Resources\MonitoringPendidikans\Schemas;

use App\Models\MonitoringPendidikan;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MonitoringPendidikanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Siswa & Akademik')->schema([
                    Select::make('anak_asuh_id')
                        ->label('Anak Asuh')
                        ->relationship('anakAsuh', 'nama_lengkap')
                        ->searchable()
                        ->preload()
                        ->required(),
                    Group::make([
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
                            ->rules([
                                fn ($get, $record) => function (string $attribute, $value, \Closure $fail) use ($get, $record) {
                                    $anakAsuhId = $get('anak_asuh_id');
                                    $tahunAjaran = $get('tahun_ajaran');

                                    if ($anakAsuhId && $tahunAjaran && $value) {
                                        $exists = MonitoringPendidikan::where('anak_asuh_id', $anakAsuhId)
                                            ->where('tahun_ajaran', $tahunAjaran)
                                            ->where('semester', $value)
                                            ->when($record, fn ($q) => $q->where('id', '!=', $record->id))
                                            ->exists();

                                        if ($exists) {
                                            $fail("Data monitoring pendidikan untuk Anak, Tahun Ajaran {$tahunAjaran}, dan Semester {$value} sudah ada.");
                                        }
                                    }
                                },
                            ])
                            ->required(),
                    ])->columns(2),
                    Group::make([
                        TextInput::make('nama_sekolah')
                            ->label('Nama Sekolah'),
                        TextInput::make('kelas')
                            ->label('Kelas'),
                    ])->columns(2),
                    Group::make([
                        TextInput::make('nilai_rata_rata')
                            ->label('Nilai Rata-rata')
                            ->numeric(),
                        TextInput::make('persentase_kehadiran')
                            ->label('Persentase Kehadiran (%)')
                            ->numeric(),
                    ])->columns(2),
                    DatePicker::make('tanggal_input')
                        ->label('Tanggal Input')
                        ->default(now())
                        ->required(),
                ]),

                Section::make('Catatan & Prestasi')->schema([
                    Textarea::make('prestasi')
                        ->label('Prestasi')
                        ->placeholder('Contoh: Juara 2 Lomba Matematika')
                        ->columnSpanFull(),
                    Textarea::make('catatan_guru')
                        ->label('Catatan Guru / Wali Kelas')
                        ->columnSpanFull(),
                ]),
            ]);
    }
}
