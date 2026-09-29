<?php

namespace App\Filament\Resources\MonitoringKesehatans\Pages;

use App\Filament\Resources\MonitoringKesehatans\MonitoringKesehatanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMonitoringKesehatans extends ListRecords
{
    protected static string $resource = MonitoringKesehatanResource::class;

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
                ->label('Tambah Data')
                ->visible(fn (): bool => static::getResource()::canCreate()),
        ];
    }
}
