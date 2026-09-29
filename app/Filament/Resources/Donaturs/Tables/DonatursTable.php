<?php

namespace App\Filament\Resources\Donaturs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DonatursTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                IconColumn::make('status_aktif')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
                    ->visible(fn ($record): bool => \App\Filament\Resources\Donaturs\DonaturResource::canEdit($record)),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->visible(fn (): bool => \App\Filament\Resources\Donaturs\DonaturResource::canDeleteAny()),
                ])->visible(fn (): bool => \App\Filament\Resources\Donaturs\DonaturResource::canDeleteAny()),
            ]);
    }
}
