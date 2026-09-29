<?php

namespace App\Filament\Resources\Donasis\Pages;

use App\Filament\Resources\Donasis\DonasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDonasis extends ListRecords
{
    protected static string $resource = DonasiResource::class;

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
                ->label('Tambah Donasi')
                ->visible(fn (): bool => static::getResource()::canCreate()),
        ];
    }
}
