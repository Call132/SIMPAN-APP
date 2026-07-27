<?php

namespace App\Filament\Resources\Donaturs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DonaturForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->placeholder('Hamba Allah / Dermawan'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('telepon')
                    ->tel(),
                Textarea::make('alamat')
                    ->columnSpanFull(),
                Toggle::make('status_aktif')
                    ->required(),
            ]);
    }
}
