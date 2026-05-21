<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionPackageResource\Pages;
use App\Models\SubscriptionPackage;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class SubscriptionPackageResource extends Resource
{
    protected static ?string $model = SubscriptionPackage::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static string | \UnitEnum | null $navigationGroup = 'Subscriptions';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('₹'),
                Forms\Components\Select::make('interval')
                    ->options([
                        'monthly' => 'Monthly',
                        'yearly' => 'Yearly',
                        'one-time' => 'One-time',
                    ])
                    ->required(),
                Forms\Components\Select::make('target_role')
                    ->options([
                        'provider' => 'Provider',
                        'customer' => 'Customer',
                    ])
                    ->required(),
                Forms\Components\TagsInput::make('features')
                    ->placeholder('Add feature...'),
                Forms\Components\Toggle::make('is_active')
                    ->required()
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('INR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('interval')
                    ->searchable(),
                Tables\Columns\TextColumn::make('target_role')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListSubscriptionPackages::route('/'),
            'create' => Pages\CreateSubscriptionPackage::route('/create'),
            'edit' => Pages\EditSubscriptionPackage::route('/{record}/edit'),
        ];
    }
}
