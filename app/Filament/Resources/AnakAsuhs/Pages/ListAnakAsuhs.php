<?php

namespace App\Filament\Resources\AnakAsuhs\Pages;

use App\Filament\Resources\AnakAsuhs\AnakAsuhResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAnakAsuhs extends ListRecords
{
    protected static string $resource = AnakAsuhResource::class;

    public function getSubheading(): ?string
    {
        if (! static::getResource()::canCreate()) {
            return 'Peran Anda memiliki akses lihat data (Read-Only). Penambahan dan perubahan data dinonaktifkan.';
        }

        return null;
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Anak Asuh')
                ->visible(fn (): bool => static::getResource()::canCreate()),
        ];
    }
}
