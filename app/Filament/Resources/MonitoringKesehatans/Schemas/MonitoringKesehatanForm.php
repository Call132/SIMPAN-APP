<?php

namespace App\Filament\Resources\MonitoringKesehatans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MonitoringKesehatanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pasien & Physical Check')->schema([
                    Select::make('anak_asuh_id')
                        ->label('Anak Asuh')
                        ->relationship('anakAsuh', 'nama_lengkap')
                        ->searchable()
                        ->preload()
                        ->required(),
                    DatePicker::make('tanggal_pemeriksaan')
                        ->label('Tanggal Pemeriksaan')
                        ->default(now())
                        ->required(),
                    Group::make([
                        TextInput::make('tinggi_badan')
                            ->label('Tinggi Badan (cm)')
                            ->numeric(),
                        TextInput::make('berat_badan')
                            ->label('Berat Badan (kg)')
                            ->numeric(),
                        TextInput::make('lingkar_kepala')
                            ->label('Lingkar Kepala (cm)')
                            ->numeric(),
                    ])->columns(3),
                    Select::make('status_gizi')
                        ->label('Status Gizi')
                        ->options([
                            'Baik' => 'Baik',
                            'Kurang' => 'Kurang',
                            'Buruk' => 'Buruk',
                            'Lebih' => 'Lebih',
                        ]),
                ]),

                Section::make('Hasil Pemeriksaan & Tindakan Medis')->schema([
                    TextInput::make('nama_pemeriksa')
                        ->label('Nama Pemeriksa / Dokter')
                        ->placeholder('Contoh: Dr. Herman'),
                    TextInput::make('diagnosis')
                        ->label('Diagnosis')
                        ->columnSpanFull(),
                    Textarea::make('keluhan')
                        ->label('Keluhan / Gejala')
                        ->columnSpanFull(),
                    Textarea::make('tindakan')
                        ->label('Tindakan / Resep Obat')
                        ->columnSpanFull(),
                    Textarea::make('catatan_tambahan')
                        ->label('Catatan Tambahan')
                        ->columnSpanFull(),
                ]),
            ]);
    }
}
