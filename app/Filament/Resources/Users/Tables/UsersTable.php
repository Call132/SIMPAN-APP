<?php

namespace App\Filament\Resources\Users\Tables;

use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('role')
                    ->label('Peran')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => User::getRoleOptions()[$state] ?? (string) $state)
                    ->color(fn (?string $state): string => match ($state) {
                        User::ROLE_ADMIN => 'danger',
                        User::ROLE_KEPALA_PANTI => 'warning',
                        User::ROLE_PENGURUS => 'info',
                        User::ROLE_PENGASUH => 'success',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label('Filter Peran')
                    ->options(User::getRoleOptions()),
            ])
            ->recordActions([
                EditAction::make()
                    ->visible(fn ($record): bool => \App\Filament\Resources\Users\UserResource::canEdit($record)),
                DeleteAction::make()
                    ->visible(fn ($record): bool => \App\Filament\Resources\Users\UserResource::canDelete($record))
                    ->hidden(fn (User $record): bool => $record->id === auth()->id()),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->visible(fn (): bool => \App\Filament\Resources\Users\UserResource::canDeleteAny()),
                ])->visible(fn (): bool => \App\Filament\Resources\Users\UserResource::canDeleteAny()),
            ]);
    }
}
