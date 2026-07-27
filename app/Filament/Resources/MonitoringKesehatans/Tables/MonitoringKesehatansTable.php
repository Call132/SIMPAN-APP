<?php

namespace App\Filament\Resources\MonitoringKesehatans\Tables;

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

class MonitoringKesehatansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('anakAsuh.nama_lengkap')
                    ->label('Nama Anak')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tanggal_pemeriksaan')
                    ->label('Tanggal Pemeriksaan')
                    ->date('d F Y')
                    ->sortable(),
                TextColumn::make('tinggi_badan')
                    ->label('Tinggi')
                    ->formatStateUsing(fn ($state) => $state ? "{$state} cm" : '-')
                    ->placeholder('-'),
                TextColumn::make('berat_badan')
                    ->label('Berat')
                    ->formatStateUsing(fn ($state) => $state ? "{$state} kg" : '-')
                    ->placeholder('-'),
                TextColumn::make('status_gizi')
                    ->label('Status Gizi')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'Baik' => 'success',
                        'Kurang' => 'warning',
                        'Buruk' => 'danger',
                        'Lebih' => 'info',
                        default => 'gray',
                    })
                    ->placeholder('-'),
                TextColumn::make('nama_pemeriksa')
                    ->label('Pemeriksa')
                    ->placeholder('-')
                    ->searchable(),
            ])
            ->defaultSort('tanggal_pemeriksaan', 'desc')
            ->filters([
                SelectFilter::make('anak_asuh_id')
                    ->label('Anak Asuh')
                    ->relationship('anakAsuh', 'nama_lengkap')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('status_gizi')
                    ->label('Status Gizi')
                    ->options([
                        'Baik' => 'Baik',
                        'Kurang' => 'Kurang',
                        'Buruk' => 'Buruk',
                        'Lebih' => 'Lebih',
                    ]),
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
