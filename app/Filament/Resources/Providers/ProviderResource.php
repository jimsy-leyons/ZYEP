<?php

namespace App\Filament\Resources\Providers;

use App\Filament\Resources\Providers\Pages\CreateProvider;
use App\Filament\Resources\Providers\Pages\EditProvider;
use App\Filament\Resources\Providers\Pages\ListProviders;
use App\Filament\Resources\Providers\Pages\ViewProvider;
use App\Filament\Resources\Providers\Schemas\ProviderForm;
use App\Filament\Resources\Providers\Schemas\ProviderInfolist;
use App\Filament\Resources\Providers\Tables\ProvidersTable;
use App\Models\Provider;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProviderResource extends Resource
{
    protected static ?string $model = Provider::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-briefcase';

    protected static string | \UnitEnum | null $navigationGroup = 'Directory';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 0)->count() ?: null;
    }

    public static function getNavigationBadgeColor(): string | array | null
    {
        return 'warning';
    }

    public static function form(Schema $schema): Schema
    {
        return ProviderForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProviderInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProvidersTable::configure($table);
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
            'index' => ListProviders::route('/'),
            'create' => CreateProvider::route('/create'),
            'view' => ViewProvider::route('/{record}'),
            'edit' => EditProvider::route('/{record}/edit'),
        ];
    }
}
