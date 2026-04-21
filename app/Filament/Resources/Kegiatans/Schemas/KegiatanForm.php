<?php

namespace App\Filament\Resources\Kegiatans\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class KegiatanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_kegiatan')
                    ->required(),
                \Filament\Forms\Components\RichEditor::make('deskripsi')
                    ->columnSpanFull(),
                DateTimePicker::make('tanggal_mulai')
                    ->required(),
                DateTimePicker::make('tanggal_selesai'),
                TextInput::make('tempat')
                    ->required(),
                Select::make('kategori')
                    ->options([
                        'keagamaan' => 'Keagamaan',
                        'pendidikan' => 'Pendidikan',
                        'sosial' => 'Sosial',
                        'keterampilan' => 'Keterampilan',
                        'lainnya' => 'Lainnya',
                    ])
                    ->required(),
                TextInput::make('penanggung_jawab'),
                \Filament\Forms\Components\FileUpload::make('dokumentasi')
                    ->multiple()
                    ->image()
                    ->disk('public')
                    ->directory('kegiatans')
                    ->maxSize(2048)
                    ->columnSpanFull(),
                Toggle::make('is_published')
                    ->label('Publikasikan ke Website')
                    ->required(),
                Toggle::make('is_public_photo')
                    ->label('Foto Aman untuk Publik')
                    ->helperText('Centang jika foto tidak menampilkan wajah anak secara mengekspos demi keamanan')
                    ->required(),
            ]);
    }
}
