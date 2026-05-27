<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClientForm
{
    /**
     * Configurazione del form Client.
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // Campo nome cliente
                TextInput::make('name')
                    ->required()// obbligatorio
                    ->minLength(3),
                // Campo telefono
                TextInput::make('phone')
                    ->tel() // input tipo telefono
                    ->required(),

                // Campo email
                TextInput::make('email')
                    ->label('Email address') // etichetta personalizzata
                    ->email() // valida formato email
                    ->required()
                    ->unique(ignoreRecord: true), // email univoca, ignora record corrente in update

                // Campo indirizzo
                TextInput::make('address')
                    ->required(),
            ]);
    }
}
