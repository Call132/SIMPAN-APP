<?php

namespace App\Filament\Resources\Donaturs\Pages;

use App\Filament\Resources\Donaturs\DonaturResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDonaturs extends ListRecords
{
    protected static string $resource = DonaturResource::class;

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
                ->label('Tambah Donatur')
                ->visible(fn (): bool => static::getResource()::canCreate()),
        ];
    }
}
