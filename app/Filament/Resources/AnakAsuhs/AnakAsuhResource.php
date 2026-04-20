<?php

namespace App\Filament\Resources\AnakAsuhs;

use App\Filament\Resources\AnakAsuhs\Pages\CreateAnakAsuh;
use App\Filament\Resources\AnakAsuhs\Pages\EditAnakAsuh;
use App\Filament\Resources\AnakAsuhs\Pages\ListAnakAsuhs;
use App\Filament\Resources\AnakAsuhs\Schemas\AnakAsuhForm;
use App\Filament\Resources\AnakAsuhs\Tables\AnakAsuhsTable;
use App\Models\AnakAsuh;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnakAsuhResource extends Resource
{
    protected static ?string $model = AnakAsuh::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-users';

    protected static \UnitEnum|string|null $navigationGroup = 'Manajemen Panti';

    protected static ?string $navigationLabel = 'Anak Asuh';

    protected static ?string $modelLabel = 'Anak Asuh';

    protected static ?string $pluralModelLabel = 'Anak Asuh';

    protected static ?string $slug = 'anak-asuh';

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function form(Schema $schema): Schema
    {
        return AnakAsuhForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnakAsuhsTable::configure($table);
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
            'index' => ListAnakAsuhs::route('/'),
            'create' => CreateAnakAsuh::route('/create'),
            'edit' => EditAnakAsuh::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
