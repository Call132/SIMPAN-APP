<?php

namespace App\Filament\Resources\MonitoringPendidikans\Pages;

use App\Filament\Resources\MonitoringPendidikans\MonitoringPendidikanResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditMonitoringPendidikan extends EditRecord
{
    protected static string $resource = MonitoringPendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
