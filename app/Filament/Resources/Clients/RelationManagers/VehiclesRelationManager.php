<?php

namespace App\Filament\Resources\Clients\RelationManagers;

use Filament\Actions;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

/**
 * Relation manager per gestire i veicoli associati a un cliente.
 * 
 * Permette di visualizzare, creare, modificare ed eliminare i veicoli
 * direttamente dalla pagina di dettaglio del cliente.
 */
class VehiclesRelationManager extends RelationManager
{
    /**
     * Nome della relazione nel modello Client.
     * 
     * @var string
     */
    protected static string $relationship = 'vehicles';

    /**
     * Titolo visualizzato nella sezione relazione.
     * 
     * @var string
     */
    protected static ?string $title = 'Veicoli';

    /**
     * Configura il form per la creazione e modifica dei veicoli.
     * 
     * @param Schema $schema Istanza dello schema Filament
     * @return Schema Schema configurato con i campi del form
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                // Marca del veicolo
                Forms\Components\TextInput::make('brand')
                    ->required()
                    ->label('Marca')
                    ->maxLength(255),
                // Modello del veicolo
                Forms\Components\TextInput::make('model')
                    ->required()
                    ->label('Modello')
                    ->maxLength(255),
                // Anno di produzione
                Forms\Components\TextInput::make('year')
                    ->required()
                    ->label('Anno')
                    ->numeric(),
                // Targa del veicolo (univoca)
                Forms\Components\TextInput::make('license_plate')
                    ->required()
                    ->label('Targa')
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
            ]);
    }

    /**
     * Configura la tabella per la visualizzazione dei veicoli.
     * 
     * @param Table $table Istanza della tabella Filament
     * @return Table Tabella configurata con colonne, filtri e azioni
     */
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                // Marca del veicolo
                Tables\Columns\TextColumn::make('brand')
                    ->label('Marca')
                    ->searchable()
                    ->sortable(),
                // Modello del veicolo
                Tables\Columns\TextColumn::make('model')
                    ->label('Modello')
                    ->searchable()
                    ->sortable(),
                // Anno di produzione
                Tables\Columns\TextColumn::make('year')
                    ->label('Anno')
                    ->sortable(),
                // Targa del veicolo
                Tables\Columns\TextColumn::make('license_plate')
                    ->label('Targa')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                // Filtri (attualmente non definiti)
            ])
            ->headerActions([
                // Azione per creare un nuovo veicolo
                Actions\CreateAction::make(),
            ])
            ->actions([
                // Azione per modificare un veicolo
                Actions\EditAction::make(),
                // Azione per eliminare un veicolo
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Azioni di gruppo per eliminare più veicoli
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
