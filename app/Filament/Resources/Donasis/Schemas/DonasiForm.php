<?php

namespace App\Filament\Resources\Donasis\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Support\RawJs;
use Filament\Schemas\Schema;

class DonasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('donatur_id')
                    ->relationship('donatur', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                DatePicker::make('tanggal_donasi')
                    ->required(),
                Select::make('jenis_donasi')
                    ->options([
                        'uang' => 'Uang',
                        'barang' => 'Barang',
                        'makanan' => 'Makanan',
                        'pakaian' => 'Pakaian',
                        'buku' => 'Buku',
                        'lainnya' => 'Lainnya',
                    ])
                    ->required(),
                TextInput::make('jumlah_uang')
                    ->numeric()
                    ->prefix('Rp')
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(','),
                TextInput::make('satuan_barang'),
                TextInput::make('jumlah_barang')
                    ->numeric(),
                Textarea::make('keterangan')
                    ->columnSpanFull(),
                TextInput::make('bukti_transfer'),
            ]);
    }
}
