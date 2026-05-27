<?php

namespace App\Filament\Resources\Vehicles\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

/**
 * Classe responsabile della configurazione del form
 * per la creazione e modifica dei veicoli.
 */
class VehicleForm
{
    /**
     * Configura e restituisce lo schema del form per i veicoli.
     *
     * @param Schema $schema Istanza dello schema Filament
     * @return Schema Schema configurato con i campi del form
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // Selettore del cliente associato al veicolo
                Select::make('client_id')
                    ->label(__('filament-resources.vehicle.form.client_id'))
                    ->relationship('client', 'name')
                    ->required(),

                // Marca del veicolo
                TextInput::make('brand')
                    ->label(__('filament-resources.vehicle.form.brand'))
                    ->required(),

                // Modello del veicolo
                TextInput::make('model')
                    ->label(__('filament-resources.vehicle.form.model'))
                    ->required(),

                // Anno di produzione
                TextInput::make('year')
                    ->label(__('filament-resources.vehicle.form.year'))
                    ->required(),

                // Targa del veicolo (univoca)
                TextInput::make('license_plate')
                    ->label(__('filament-resources.vehicle.form.license_plate'))
                    ->required()
                    ->unique(ignoreRecord: true),
            ]);
    }
}
