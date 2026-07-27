<?php

namespace App\Filament\Pages;

use App\Settings\PantiSettings;
use Filament\Schemas\Schema;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

class ManagePantiSettings extends SettingsPage
{
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static \UnitEnum|string|null $navigationGroup = 'Profil Panti';
    protected static ?string $navigationLabel = 'Profil Panti';
    protected static ?string $title = 'Informasi & Profil Panti';

    protected static string $settings = PantiSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Umum')
                    ->description('Kelola detail profil panti asuhan.')
                    ->schema([
                        TextInput::make('nama_panti')
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\RichEditor::make('sejarah_panti')
                            ->label('Sejarah Singkat')
                            ->columnSpanFull(),
                        \Filament\Forms\Components\RichEditor::make('visi_panti')
                            ->label('Visi')
                            ->columnSpanFull(),
                        \Filament\Forms\Components\RichEditor::make('misi_panti')
                            ->label('Misi')
                            ->columnSpanFull(),
                        Textarea::make('alamat')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        TextInput::make('kota')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('kode_pos')
                            ->required()
                            ->maxLength(20),
                        TextInput::make('telepon')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Textarea::make('maps_embed_url')
                            ->label('Google Maps Embed URL')
                            ->columnSpanFull(),
                        FileUpload::make('logo_path')
                            ->label('Logo Panti')
                            ->image()
                            ->disk('public')
                            ->directory('panti-logos')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Rekening Donasi')
                    ->description('Atur rekening bank resmi untuk transfer donatur.')
                    ->schema([
                        TextInput::make('nama_bank')
                            ->label('Nama Bank'),
                        TextInput::make('nomor_rekening')
                            ->label('No. Rekening'),
                        TextInput::make('atas_nama')
                            ->label('Atas Nama'),
                    ])->columns(3),
            ]);
    }
}
