<?php

namespace App\Filament\Resources\MonitoringPendidikans\Pages;

use App\Filament\Resources\MonitoringPendidikans\MonitoringPendidikanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMonitoringPendidikan extends ViewRecord
{
    protected static string $resource = MonitoringPendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
