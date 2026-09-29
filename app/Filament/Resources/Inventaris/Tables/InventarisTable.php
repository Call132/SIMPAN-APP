<?php

namespace App\Filament\Resources\Inventaris\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InventarisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_barang')
                    ->searchable(),
                TextColumn::make('kategori')
                    ->badge(),
                TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kondisi')
                    ->badge(),
                TextColumn::make('lokasi_penyimpanan')
                    ->searchable(),
                TextColumn::make('tanggal_pembelian')
                    ->date()
                    ->sortable(),
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
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
                    ->visible(fn ($record): bool => \App\Filament\Resources\Inventaris\InventarisResource::canEdit($record)),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->visible(fn (): bool => \App\Filament\Resources\Inventaris\InventarisResource::canDeleteAny()),
                ])->visible(fn (): bool => \App\Filament\Resources\Inventaris\InventarisResource::canDeleteAny()),
            ]);
    }
}
