<?php

namespace App\Filament\Resources\Vehicles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

/**
 * Classe responsabile della configurazione della tabella
 * per la gestione dei veicoli all'interno di Filament.
 */
class VehiclesTable
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

            /**
             * COLONNE DELLA TABELLA
             * Ogni colonna rappresenta un campo del modello Vehicle.
             */
            ->columns([
                // Nome del cliente associato (relazione client -> name)
                TextColumn::make('client.name')
                    ->searchable(),

                // Marca del veicolo
                TextColumn::make('brand')
                    ->searchable(),

                // Modello del veicolo
                TextColumn::make('model')
                    ->searchable(),

                // Anno di produzione
                TextColumn::make('year')
                    ->searchable(),

                // Targa del veicolo
                TextColumn::make('license_plate')
                    ->searchable(),

                // Data di creazione (nascosta di default ma attivabile)
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Data di ultimo aggiornamento (nascosta di default ma attivabile)
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            /**
             * FILTRI
             * Attualmente non definiti ma pronti per essere aggiunti
             * (es. filtro per marca, cliente, anno, ecc.)
             */
            ->filters([
                //
            ])

            /**
             * AZIONI PER SINGOLA RIGA
             * Azioni disponibili per ogni record della tabella.
             */
            ->actions([
                EditAction::make(), // Permette di modificare il veicolo
            ])

            /**
             * AZIONI DI GRUPPO (BULK ACTIONS)
             * Azioni eseguibili su più righe selezionate.
             */
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(), // Elimina multipli veicoli selezionati
                ]),
            ]);
    }
}
