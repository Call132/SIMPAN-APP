<?php

namespace App\Filament\Resources\MonitoringKesehatans\Pages;

use App\Filament\Resources\MonitoringKesehatans\MonitoringKesehatanResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditMonitoringKesehatan extends EditRecord
{
    protected static string $resource = MonitoringKesehatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
