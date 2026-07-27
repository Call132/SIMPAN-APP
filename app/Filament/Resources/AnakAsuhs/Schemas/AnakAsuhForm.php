<?php

namespace App\Filament\Resources\AnakAsuhs\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AnakAsuhForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pribadi & Identitas')
                    ->description('Biodata dasar anak asuh panti')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('foto')
                            ->avatar()
                            ->image()
                            ->directory('anak-asuh')
                            ->columnSpanFull(),
                        TextInput::make('nama_lengkap')
                            ->label('Nama Lengkap')
                            ->required(),
                        TextInput::make('nama_panggilan')
                            ->label('Nama Panggilan'),
                        Select::make('jenis_kelamin')
                            ->label('Jenis Kelamin')
                            ->options(['L' => 'Laki-laki', 'P' => 'Perempuan'])
                            ->required(),
                        Select::make('agama')
                            ->label('Agama')
                            ->options([
                                'Islam' => 'Islam',
                                'Kristen' => 'Kristen',
                                'Katolik' => 'Katolik',
                                'Hindu' => 'Hindu',
                                'Buddha' => 'Buddha',
                                'Konghucu' => 'Konghucu',
                            ])
                            ->default('Islam'),
                        TextInput::make('tempat_lahir')
                            ->label('Tempat Lahir')
                            ->required(),
                        DatePicker::make('tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->required(),
                        Toggle::make('status_aktif')
                            ->label('Status Aktif di Panti')
                            ->default(true)
                            ->required(),
                        Textarea::make('alamat_asal')
                            ->label('Alamat Asal / Tempat Tinggal Sebelumnya')
                            ->columnSpanFull(),
                        Textarea::make('keterangan_masuk')
                            ->label('Keterangan / Latar Belakang Masuk Panti')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
