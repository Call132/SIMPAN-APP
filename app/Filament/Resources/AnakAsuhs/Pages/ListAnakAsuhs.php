<?php

namespace App\Filament\Resources\AnakAsuhs\Pages;

use App\Filament\Resources\AnakAsuhs\AnakAsuhResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAnakAsuhs extends ListRecords
{
    protected static string $resource = AnakAsuhResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Anak Asuh'),
        ];
    }
}
