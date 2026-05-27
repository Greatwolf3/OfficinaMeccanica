<?php

namespace App\Filament\Resources\Vehicles;

use App\Filament\Resources\Vehicles\Pages\CreateVehicle;
use App\Filament\Resources\Vehicles\Pages\EditVehicle;
use App\Filament\Resources\Vehicles\Pages\ListVehicles;
use App\Filament\Resources\Vehicles\RelationManagers\ServicesRelationManager;
use App\Filament\Resources\Vehicles\Schemas\VehicleForm;
use App\Filament\Resources\Vehicles\Tables\VehiclesTable;
use App\Models\Vehicle;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

/**
 * Risorsa Filament per la gestione dei veicoli.
 *
 * Questa classe definisce la configurazione della risorsa Vehicle,
 * inclusi form, tabella, relazioni e pagine.
 */
class VehicleResource extends Resource
{
    /**
     * Modello Eloquent associato a questa risorsa.
     *
     * @var string
     */
    protected static ?string $model = Vehicle::class;

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
    protected static ?string $recordTitleAttribute = 'Vehicle';


    /**
     *   LABELS MULTILINGUA (dal file vehicle.php)
     */
    public static function getModelLabel(): string
    {
        return __('filament-resources.vehicle.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-resources.vehicle.plural_label');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-resources.vehicle.navigation.label');
    }



    /**
     * Configura il form per la creazione e modifica dei veicoli.
     *
     * @param Schema $schema Istanza dello schema Filament
     * @return Schema Schema configurato con i campi del form
     */
    public static function form(Schema $schema): Schema
    {
        return VehicleForm::configure($schema);
    }

    /**
     * Configura la tabella per la visualizzazione dei veicoli.
     *
     * @param Table $table Istanza della tabella Filament
     * @return Table Tabella configurata con colonne, filtri e azioni
     */
    public static function table(Table $table): Table
    {
        return VehiclesTable::configure($table);
    }

    /**
     * Definisce le relazioni gestibili per questa risorsa.
     *
     * @return array Array dei relation manager
     */
    public static function getRelations(): array
    {
        return [
            RelationManagers\ServicesRelationManager::class,
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
            'index' => ListVehicles::route('/'),
            'create' => CreateVehicle::route('/create'),
            'edit' => EditVehicle::route('/{record}/edit'),
        ];
    }
}
