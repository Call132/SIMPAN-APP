<?php

namespace App\Filament\Resources\Kegiatans;

use App\Filament\Resources\Kegiatans\Pages\CreateKegiatan;
use App\Filament\Resources\Kegiatans\Pages\EditKegiatan;
use App\Filament\Resources\Kegiatans\Pages\ListKegiatans;
use App\Filament\Resources\Kegiatans\Schemas\KegiatanForm;
use App\Filament\Resources\Kegiatans\Tables\KegiatansTable;
use App\Models\Kegiatan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-calendar';
    
    protected static \UnitEnum|string|null $navigationGroup = 'Operasional';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Kegiatan';
    
    protected static ?string $modelLabel = 'Kegiatan';
    
    protected static ?string $pluralModelLabel = 'Kegiatan';

    protected static ?string $slug = 'kegiatan';

    protected static ?string $recordTitleAttribute = 'nama_kegiatan';

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
        return KegiatanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KegiatansTable::configure($table);
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
            'index' => ListKegiatans::route('/'),
            'create' => CreateKegiatan::route('/create'),
            'edit' => EditKegiatan::route('/{record}/edit'),
        ];
    }
}
