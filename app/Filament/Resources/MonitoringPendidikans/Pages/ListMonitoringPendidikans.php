<?php

namespace App\Filament\Resources\MonitoringPendidikans\Pages;

use App\Filament\Resources\MonitoringPendidikans\MonitoringPendidikanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMonitoringPendidikans extends ListRecords
{
    protected static string $resource = MonitoringPendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Data'),
        ];
    }
}
