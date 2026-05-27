<?php

namespace App\Filament\Resources\Services;

use App\Filament\Resources\Services\Pages\CreateService;
use App\Filament\Resources\Services\Pages\EditService;
use App\Filament\Resources\Services\Pages\ListServices;
use App\Filament\Resources\Services\Schemas\ServiceForm;
use App\Filament\Resources\Services\Tables\ServicesTable;
use App\Models\Service;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

/**
 * Risorsa Filament per la gestione dei servizi.
 *
 * Questa classe definisce la configurazione della risorsa Service,
 * inclusi form, tabella e pagine.
 */
class ServiceResource extends Resource
{
    /**
     * Modello Eloquent associato a questa risorsa.
     *
     * @var string
     */
    protected static ?string $model = Service::class;

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
    protected static ?string $recordTitleAttribute = 'service';


    /**
     *   LABELS MULTILINGUA (dal file vehicle.php)
     */
    public static function getModelLabel(): string
    {
        return __('filament-resources.service.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-resources.service.plural_label');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-resources.service.navigation.label');
    }


    /**
     * Configura il form per la creazione e modifica dei servizi.
     *
     * @param Schema $schema Istanza dello schema Filament
     * @return Schema Schema configurato con i campi del form
     */
    public static function form(Schema $schema): Schema
    {
        return ServiceForm::configure($schema);
    }

    /**
     * Configura la tabella per la visualizzazione dei servizi.
     *
     * @param Table $table Istanza della tabella Filament
     * @return Table Tabella configurata con colonne, filtri e azioni
     */
    public static function table(Table $table): Table
    {
        return ServicesTable::configure($table);
    }

    /**
     * Definisce le relazioni gestibili per questa risorsa.
     *
     * @return array Array dei relation manager
     */
    public static function getRelations(): array
    {
        return [
            // Nessuna relazione diretta gestita (il servizio è collegato al veicolo)
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
            'index' => ListServices::route('/'),
            'create' => CreateService::route('/create'),
            'edit' => EditService::route('/{record}/edit'),
        ];
    }
}
