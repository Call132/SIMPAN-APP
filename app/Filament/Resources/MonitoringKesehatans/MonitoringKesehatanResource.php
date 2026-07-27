<?php

namespace App\Filament\Resources\MonitoringKesehatans;

use App\Filament\Resources\MonitoringKesehatans\Pages\CreateMonitoringKesehatan;
use App\Filament\Resources\MonitoringKesehatans\Pages\EditMonitoringKesehatan;
use App\Filament\Resources\MonitoringKesehatans\Pages\ListMonitoringKesehatans;
use App\Filament\Resources\MonitoringKesehatans\Pages\ViewMonitoringKesehatan;
use App\Filament\Resources\MonitoringKesehatans\Schemas\MonitoringKesehatanForm;
use App\Filament\Resources\MonitoringKesehatans\Tables\MonitoringKesehatansTable;
use App\Models\MonitoringKesehatan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class MonitoringKesehatanResource extends Resource
{
    protected static ?string $model = MonitoringKesehatan::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-heart';

    protected static UnitEnum|string|null $navigationGroup = 'Monitoring Anak';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Monitoring Kesehatan';

    protected static ?string $modelLabel = 'Monitoring Kesehatan';

    protected static ?string $pluralModelLabel = 'Monitoring Kesehatan';

    protected static ?string $slug = 'monitoring-kesehatan';

    public static function form(Schema $schema): Schema
    {
        return MonitoringKesehatanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MonitoringKesehatansTable::configure($table);
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
            'index' => ListMonitoringKesehatans::route('/'),
            'create' => CreateMonitoringKesehatan::route('/create'),
            'view' => ViewMonitoringKesehatan::route('/{record}'),
            'edit' => EditMonitoringKesehatan::route('/{record}/edit'),
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
