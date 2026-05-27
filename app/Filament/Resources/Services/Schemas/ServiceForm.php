<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

/**
 * Form Service (multilingua)
 */
class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('vehicle_id')
                    ->label(__('filament-resources.service.form.vehicle_id'))
                    ->relationship('vehicle', 'brand')
                    ->getOptionLabelFromRecordUsing(
                        fn ($record) => "{$record->brand} {$record->model} ({$record->license_plate})"
                    )
                    ->searchable()
                    ->required(),

                Textarea::make('description')
                    ->label(__('filament-resources.service.form.description'))
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('cost')
                    ->label(__('filament-resources.service.form.cost'))
                    ->required()
                    ->numeric()
                    ->prefix('$'),

                DatePicker::make('date')
                    ->label(__('filament-resources.service.form.date'))
                    ->required(),
            ]);
    }
}
