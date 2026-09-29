<?php

namespace App\Filament\Resources\Penguruses\Pages;

use App\Filament\Resources\Penguruses\PengurusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPenguruses extends ListRecords
{
    protected static string $resource = PengurusResource::class;

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
                ->label('Tambah Pengurus')
                ->visible(fn (): bool => static::getResource()::canCreate()),
        ];
    }
}
