<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('parent_id')
                    ->relationship('parent', 'name')
                    ->label('Parent Category')
                    ->placeholder('Select if this is a subcategory')
                    ->searchable()
                    ->nullable(),
                TextInput::make('icon')
                    ->maxLength(255)
                    ->helperText('Use an emoji (e.g. 🔧) for major categories'),
                Textarea::make('description')
                    ->rows(3)
                    ->maxLength(500)
                    ->helperText('Brief description of the services in this category'),
            ]);
    }
}
