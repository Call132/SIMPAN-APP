<?php

namespace App\Filament\Resources\Inventaris;

use App\Filament\Resources\Inventaris\Pages\CreateInventaris;
use App\Filament\Resources\Inventaris\Pages\EditInventaris;
use App\Filament\Resources\Inventaris\Pages\ListInventaris;
use App\Filament\Resources\Inventaris\Schemas\InventarisForm;
use App\Filament\Resources\Inventaris\Tables\InventarisTable;
use App\Models\Inventaris;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InventarisResource extends Resource
{
    protected static ?string $model = Inventaris::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static \UnitEnum|string|null $navigationGroup = 'Operasional';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Inventaris Barang';

    protected static ?string $modelLabel = 'Inventaris';

    protected static ?string $pluralModelLabel = 'Inventaris';

    protected static ?string $slug = 'inventaris';

    protected static ?string $recordTitleAttribute = 'nama_barang';

    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole(['admin', 'kepala_panti', 'pengurus']) ?? false;
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->hasRole(['admin', 'kepala_panti', 'pengurus']) ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->hasRole(['admin', 'pengurus']) ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->hasRole(['admin', 'pengurus']) ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->hasRole(['admin', 'pengurus']) ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->hasRole(['admin', 'pengurus']) ?? false;
    }

    public static function form(Schema $schema): Schema
    {
        return InventarisForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InventarisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInventaris::route('/'),
            'create' => CreateInventaris::route('/create'),
            'edit' => EditInventaris::route('/{record}/edit'),
        ];
    }
}
