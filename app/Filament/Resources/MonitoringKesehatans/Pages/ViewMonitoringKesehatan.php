<?php

namespace App\Filament\Resources\MonitoringKesehatans\Pages;

use App\Filament\Resources\MonitoringKesehatans\MonitoringKesehatanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMonitoringKesehatan extends ViewRecord
{
    protected static string $resource = MonitoringKesehatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
