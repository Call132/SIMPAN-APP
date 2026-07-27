<?php

namespace App\Filament\Resources\Penguruses;

use App\Filament\Resources\Penguruses\Pages\CreatePengurus;
use App\Filament\Resources\Penguruses\Pages\EditPengurus;
use App\Filament\Resources\Penguruses\Pages\ListPenguruses;
use App\Filament\Resources\Penguruses\Schemas\PengurusForm;
use App\Filament\Resources\Penguruses\Tables\PengurusesTable;
use App\Models\Pengurus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PengurusResource extends Resource
{
    protected static ?string $model = Pengurus::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-circle';

    protected static \UnitEnum|string|null $navigationGroup = 'Manajemen Panti';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Pengurus & Staf';

    protected static ?string $modelLabel = 'Pengurus';

    protected static ?string $pluralModelLabel = 'Pengurus';

    protected static ?string $slug = 'pengurus';

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return PengurusForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PengurusesTable::configure($table);
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
            'index' => ListPenguruses::route('/'),
            'create' => CreatePengurus::route('/create'),
            'edit' => EditPengurus::route('/{record}/edit'),
        ];
    }
}
