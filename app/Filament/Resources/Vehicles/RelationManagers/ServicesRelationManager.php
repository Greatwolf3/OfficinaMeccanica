<?php

namespace App\Filament\Resources\Vehicles\RelationManagers;

use Filament\Actions;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

/**
 * Relation manager per gestire i servizi associati a un veicolo.
 * 
 * Permette di visualizzare, creare, modificare ed eliminare i servizi
 * direttamente dalla pagina di dettaglio del veicolo.
 */
class ServicesRelationManager extends RelationManager
{
    /**
     * Nome della relazione nel modello Vehicle.
     * 
     * @var string
     */
    protected static string $relationship = 'services';

    /**
     * Titolo visualizzato nella sezione relazione.
     * 
     * @var string
     */
    protected static ?string $title = 'Servizi';

    /**
     * Configura il form per la creazione e modifica dei servizi.
     * 
     * @param Schema $schema Istanza dello schema Filament
     * @return Schema Schema configurato con i campi del form
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                // Descrizione del servizio effettuato
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label('Descrizione')
                    ->rows(3),
                // Costo del servizio in euro
                Forms\Components\TextInput::make('cost')
                    ->required()
                    ->label('Costo')
                    ->numeric()
                    ->prefix('€'),
                // Data in cui è stato effettuato il servizio
                Forms\Components\DatePicker::make('date')
                    ->required()
                    ->label('Data'),
            ]);
    }

    /**
     * Configura la tabella per la visualizzazione dei servizi.
     * 
     * @param Table $table Istanza della tabella Filament
     * @return Table Tabella configurata con colonne, filtri e azioni
     */
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                // Descrizione del servizio (troncata a 50 caratteri)
                Tables\Columns\TextColumn::make('description')
                    ->label('Descrizione')
                    ->searchable()
                    ->limit(50),
                // Costo formattato in euro
                Tables\Columns\TextColumn::make('cost')
                    ->label('Costo')
                    ->money('EUR')
                    ->sortable(),
                // Data del servizio
                Tables\Columns\TextColumn::make('date')
                    ->label('Data')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                // Filtri (attualmente non definiti)
            ])
            ->headerActions([
                // Azione per creare un nuovo servizio
                Actions\CreateAction::make(),
            ])
            ->actions([
                // Azione per modificare un servizio
                Actions\EditAction::make(),
                // Azione per eliminare un servizio
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Azioni di gruppo per eliminare più servizi
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
