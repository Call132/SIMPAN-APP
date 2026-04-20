<?php

namespace App\Filament\Resources\Donasis;

use App\Filament\Resources\Donasis\Pages\CreateDonasi;
use App\Filament\Resources\Donasis\Pages\EditDonasi;
use App\Filament\Resources\Donasis\Pages\ListDonasis;
use App\Filament\Resources\Donasis\Schemas\DonasiForm;
use App\Filament\Resources\Donasis\Tables\DonasisTable;
use App\Models\Donasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DonasiResource extends Resource
{
    protected static ?string $model = Donasi::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-currency-dollar';

    protected static \UnitEnum|string|null $navigationGroup = 'Donasi & Keuangan';

    protected static ?string $navigationLabel = 'Data Donasi';

    protected static ?string $modelLabel = 'Donasi';

    protected static ?string $pluralModelLabel = 'Donasi';

    protected static ?string $slug = 'donasi';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return DonasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DonasisTable::configure($table);
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
            'index' => ListDonasis::route('/'),
            'create' => CreateDonasi::route('/create'),
            'edit' => EditDonasi::route('/{record}/edit'),
        ];
    }
}
