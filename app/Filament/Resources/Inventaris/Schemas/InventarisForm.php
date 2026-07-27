<?php

namespace App\Filament\Resources\Inventaris\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class InventarisForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_barang')
                    ->required(),
                Select::make('kategori')
                    ->options([
            'elektronik' => 'Elektronik',
            'mebel' => 'Mebel',
            'perlengkapan' => 'Perlengkapan',
            'alat tulis' => 'Alat tulis',
            'lainnya' => 'Lainnya',
        ])
                    ->required(),
                TextInput::make('jumlah')
                    ->required()
                    ->numeric(),
                Select::make('kondisi')
                    ->options(['baik' => 'Baik', 'rusak ringan' => 'Rusak ringan', 'rusak berat' => 'Rusak berat'])
                    ->required(),
                TextInput::make('lokasi_penyimpanan'),
                DatePicker::make('tanggal_pembelian'),
                Textarea::make('keterangan')
                    ->columnSpanFull(),
            ]);
    }
}
