<?php

namespace App\Filament\Resources\Inventaris\Pages;

use App\Filament\Resources\Inventaris\InventarisResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInventaris extends ListRecords
{
    protected static string $resource = InventarisResource::class;

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
                ->label('Tambah Barang')
                ->visible(fn (): bool => static::getResource()::canCreate()),
        ];
    }
}
