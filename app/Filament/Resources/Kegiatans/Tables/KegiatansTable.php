<?php

namespace App\Filament\Resources\Kegiatans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KegiatansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_kegiatan')
                    ->searchable(),
                TextColumn::make('tanggal_mulai')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('kategori')
                    ->badge(),
                IconColumn::make('is_published')
                    ->boolean(),
                IconColumn::make('is_public_photo')
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
                \Filament\Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'keagamaan' => 'Keagamaan',
                        'pendidikan' => 'Pendidikan',
                        'sosial' => 'Sosial',
                        'keterampilan' => 'Keterampilan',
                        'lainnya' => 'Lainnya',
                    ]),
                \Filament\Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Publikasi'),
            ])
            ->recordActions([
                EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
