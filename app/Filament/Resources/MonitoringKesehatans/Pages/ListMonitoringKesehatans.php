<?php

namespace App\Filament\Resources\MonitoringKesehatans\Pages;

use App\Filament\Resources\MonitoringKesehatans\MonitoringKesehatanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMonitoringKesehatans extends ListRecords
{
    protected static string $resource = MonitoringKesehatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Data'),
        ];
    }
}
