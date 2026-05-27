<?php

namespace App\Filament\Resources\Clients;

use App\Filament\Resources\Clients\Pages\CreateClient;
use App\Filament\Resources\Clients\Pages\EditClient;
use App\Filament\Resources\Clients\Pages\ListClients;
use App\Filament\Resources\Clients\RelationManagers\VehiclesRelationManager;
use App\Filament\Resources\Clients\Schemas\ClientForm;
use App\Filament\Resources\Clients\Tables\ClientsTable;
use App\Models\Client;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

/**
 * Risorsa Filament per la gestione dei clienti.
 *
 * Questa classe definisce la configurazione della risorsa Client,
 * inclusi form, tabella, relazioni e pagine.
 */
class ClientResource extends Resource
{
    /**
     * Modello Eloquent associato a questa risorsa.
     *
     * @var string
     */
    protected static ?string $model = Client::class;

    /**
     * Icona di navigazione per la risorsa nel menu laterale.
     *
     * @var string|BackedEnum|null
     */
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    /**
     * Attributo del modello da utilizzare come titolo del record.
     *
     * @var string
     */
    protected static ?string $recordTitleAttribute = 'clients';


    /**
     *   LABELS MULTILINGUA (dal file vehicle.php)
     */
    public static function getModelLabel(): string
    {
        return __('filament-resources.client.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-resources.client.plural_label');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-resources.client.navigation.label');
    }



    /**
     * Configura il form per la creazione e modifica dei clienti.
     *
     * @param Schema $schema Istanza dello schema Filament
     * @return Schema Schema configurato con i campi del form
     */
    public static function form(Schema $schema): Schema
    {
        return ClientForm::configure($schema);
    }

    /**
     * Configura la tabella per la visualizzazione dei clienti.
     *
     * @param Table $table Istanza della tabella Filament
     * @return Table Tabella configurata con colonne, filtri e azioni
     */
    public static function table(Table $table): Table
    {
        return ClientsTable::configure($table);
    }

    /**
     * Definisce le relazioni gestibili per questa risorsa.
     *
     * @return array Array dei relation manager
     */
    public static function getRelations(): array
    {
        return [
            RelationManagers\VehiclesRelationManager::class,
        ];
    }

    /**
     * Definisce le pagine disponibili per questa risorsa.
     *
     * @return array Array delle pagine con le relative rotte
     */
    public static function getPages(): array
    {
        return [
            'index' => ListClients::route('/'),
            'create' => CreateClient::route('/create'),
            'edit' => EditClient::route('/{record}/edit'),
        ];
    }
}
