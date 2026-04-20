<?php

namespace App\Filament\Resources\AnakAsuhs\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AnakAsuhForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pribadi')->schema([
                    TextInput::make('nama_lengkap')
                        ->required(),
                    TextInput::make('nama_panggilan'),
                    Select::make('jenis_kelamin')
                        ->options(['L' => 'L', 'P' => 'P'])
                        ->required(),
                    TextInput::make('tempat_lahir')
                        ->required(),
                    DatePicker::make('tanggal_lahir')
                        ->required(),
                    TextInput::make('agama'),
                    Textarea::make('alamat_asal')
                        ->columnSpanFull(),
                    DatePicker::make('tanggal_masuk')
                        ->required(),
                    Textarea::make('keterangan_masuk')
                        ->columnSpanFull(),
                    Toggle::make('status_aktif')
                        ->required(),
                ]),
                Section::make('Kesehatan')->schema([
                    TextInput::make('golongan_darah'),
                    TextInput::make('tinggi_badan')
                        ->numeric(),
                    TextInput::make('berat_badan')
                        ->numeric(),
                    Textarea::make('riwayat_penyakit')
                        ->columnSpanFull(),
                    Textarea::make('alergi')
                        ->columnSpanFull(),
                    Textarea::make('catatan_kesehatan_lain')
                        ->columnSpanFull(),
                ]),
                Section::make('Pendidikan')->schema([
                    TextInput::make('tingkat_pendidikan'),
                    TextInput::make('nama_sekolah'),
                    TextInput::make('kelas'),
                ]),
            ]);
    }
}
