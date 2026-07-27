<?php

namespace App\Filament\Resources\MonitoringPendidikans;

use App\Filament\Resources\MonitoringPendidikans\Pages\CreateMonitoringPendidikan;
use App\Filament\Resources\MonitoringPendidikans\Pages\EditMonitoringPendidikan;
use App\Filament\Resources\MonitoringPendidikans\Pages\ListMonitoringPendidikans;
use App\Filament\Resources\MonitoringPendidikans\Pages\ViewMonitoringPendidikan;
use App\Filament\Resources\MonitoringPendidikans\Schemas\MonitoringPendidikanForm;
use App\Filament\Resources\MonitoringPendidikans\Tables\MonitoringPendidikansTable;
use App\Models\MonitoringPendidikan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class MonitoringPendidikanResource extends Resource
{
    protected static ?string $model = MonitoringPendidikan::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static UnitEnum|string|null $navigationGroup = 'Monitoring Anak';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Monitoring Pendidikan';

    protected static ?string $modelLabel = 'Monitoring Pendidikan';

    protected static ?string $pluralModelLabel = 'Monitoring Pendidikan';

    protected static ?string $slug = 'monitoring-pendidikan';

    public static function form(Schema $schema): Schema
    {
        return MonitoringPendidikanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MonitoringPendidikansTable::configure($table);
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
            'index' => ListMonitoringPendidikans::route('/'),
            'create' => CreateMonitoringPendidikan::route('/create'),
            'view' => ViewMonitoringPendidikan::route('/{record}'),
            'edit' => EditMonitoringPendidikan::route('/{record}/edit'),
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
