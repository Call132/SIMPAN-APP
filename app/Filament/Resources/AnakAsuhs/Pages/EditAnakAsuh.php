<?php

namespace App\Filament\Resources\AnakAsuhs\Pages;

use App\Filament\Resources\AnakAsuhs\AnakAsuhResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditAnakAsuh extends EditRecord
{
    protected static string $resource = AnakAsuhResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
