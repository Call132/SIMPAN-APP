<?php

namespace App\Filament\Resources\Penguruses\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PengurusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('jabatan')
                    ->required(),
                TextInput::make('alamat'),
                TextInput::make('telepon')
                    ->tel(),
                DatePicker::make('tanggal_mulai_tugas'),
                Toggle::make('status_aktif')
                    ->required(),
            ]);
    }
}
