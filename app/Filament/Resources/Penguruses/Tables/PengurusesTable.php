<?php

namespace App\Filament\Resources\Penguruses\Tables;

use App\Models\Pengurus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PengurusesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('jabatan')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        Pengurus::JABATAN_KEPALA_PANTI => 'danger',
                        Pengurus::JABATAN_SEKRETARIS => 'info',
                        Pengurus::JABATAN_BENDAHARA => 'warning',
                        Pengurus::JABATAN_PENGASUH => 'success',
                        default => 'gray',
                    })
                    ->searchable(),
                TextColumn::make('alamat')
                    ->searchable(),
                TextColumn::make('telepon')
                    ->searchable(),
                TextColumn::make('tanggal_mulai_tugas')
                    ->date()
                    ->sortable(),
                IconColumn::make('status_aktif')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('jabatan')
                    ->label('Filter Jabatan')
                    ->options(Pengurus::getJabatanOptions()),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
                    ->visible(fn ($record): bool => \App\Filament\Resources\Penguruses\PengurusResource::canEdit($record)),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->visible(fn (): bool => \App\Filament\Resources\Penguruses\PengurusResource::canDeleteAny()),
                ])->visible(fn (): bool => \App\Filament\Resources\Penguruses\PengurusResource::canDeleteAny()),
            ]);
    }
}
