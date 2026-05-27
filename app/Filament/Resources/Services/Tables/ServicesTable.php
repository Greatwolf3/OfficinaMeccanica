<?php

namespace App\Filament\Resources\Services\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

/**
 * Classe responsabile della configurazione della tabella
 * per la gestione dei servizi all'interno di Filament.
 */
class ServicesTable
{
    /**
     * Configura e restituisce la struttura della tabella.
     *
     * @param Table $table Istanza della tabella Filament
     * @return Table Tabella configurata
     */
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                // Veicolo associato (mostra marca, modello e targa)
                TextColumn::make('vehicle.brand')
                    ->label(__('filament-resources.service.table.vehicle'))
                    ->formatStateUsing(
                        fn ($record) =>
                        "{$record->vehicle->brand} {$record->vehicle->model} ({$record->vehicle->license_plate})"
                    )
                    ->searchable(),

                // Costo del servizio formattato come valuta
                TextColumn::make('cost')
                    ->label(__('filament-resources.service.table.cost'))
                    ->money()
                    ->sortable(),

                // Data del servizio
                TextColumn::make('date')
                    ->label(__('filament-resources.service.table.date'))
                    ->date()
                    ->sortable(),

                // Data di creazione (nascosta di default)
                TextColumn::make('created_at')
                    ->label(__('filament-resources.service.table.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Data di ultimo aggiornamento (nascosta di default)
                TextColumn::make('updated_at')
                    ->label(__('filament-resources.service.table.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([
                // Filtri (attualmente non definiti)
            ])

            ->actions([
                // Azione per modificare il servizio
                EditAction::make(),
            ])

            ->bulkActions([
                // Azioni di gruppo per eliminare più servizi
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
