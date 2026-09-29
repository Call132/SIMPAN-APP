<?php

namespace App\Filament\Resources\MonitoringPendidikans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class MonitoringPendidikansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('anakAsuh.nama_lengkap')
                    ->label('Nama Anak')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tahun_ajaran')
                    ->label('Tahun Ajaran')
                    ->sortable(),
                TextColumn::make('semester')
                    ->label('Semester')
                    ->badge(),
                TextColumn::make('nama_sekolah')
                    ->label('Nama Sekolah')
                    ->searchable()
                    ->placeholder('-'),
                TextColumn::make('kelas')
                    ->label('Kelas')
                    ->placeholder('-'),
                TextColumn::make('nilai_rata_rata')
                    ->label('Nilai Rata-rata')
                    ->placeholder('-')
                    ->sortable(),
                TextColumn::make('persentase_kehadiran')
                    ->label('Kehadiran')
                    ->formatStateUsing(fn ($state) => $state !== null ? "{$state}%" : '-')
                    ->placeholder('-'),
                TextColumn::make('tanggal_input')
                    ->label('Tanggal Input')
                    ->date('d F Y')
                    ->sortable(),
            ])
            ->defaultSort('tanggal_input', 'desc')
            ->filters([
                SelectFilter::make('anak_asuh_id')
                    ->label('Anak Asuh')
                    ->relationship('anakAsuh', 'nama_lengkap')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('semester')
                    ->label('Semester')
                    ->options([
                        'Ganjil' => 'Ganjil',
                        'Genap' => 'Genap',
                    ]),
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
                    ->visible(fn ($record): bool => \App\Filament\Resources\MonitoringPendidikans\MonitoringPendidikanResource::canEdit($record)),
                DeleteAction::make()
                    ->visible(fn ($record): bool => \App\Filament\Resources\MonitoringPendidikans\MonitoringPendidikanResource::canDelete($record)),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->visible(fn (): bool => \App\Filament\Resources\MonitoringPendidikans\MonitoringPendidikanResource::canDeleteAny()),
                    ForceDeleteBulkAction::make()
                        ->visible(fn (): bool => \App\Filament\Resources\MonitoringPendidikans\MonitoringPendidikanResource::canDeleteAny()),
                    RestoreBulkAction::make()
                        ->visible(fn (): bool => \App\Filament\Resources\MonitoringPendidikans\MonitoringPendidikanResource::canDeleteAny()),
                ])->visible(fn (): bool => \App\Filament\Resources\MonitoringPendidikans\MonitoringPendidikanResource::canDeleteAny()),
            ]);
    }
}
