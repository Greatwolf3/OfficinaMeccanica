<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClientForm
{
    /**
     * Configurazione form Client (multilingua)
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->label(__('filament-resources.client.form.name'))
                    ->required()
                    ->minLength(3),

                TextInput::make('phone')
                    ->label(__('filament-resources.client.form.phone'))
                    ->tel()
                    ->required(),

                TextInput::make('email')
                    ->label(__('filament-resources.client.form.email'))
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('address')
                    ->label(__('filament-resources.client.form.address'))
                    ->required(),
            ]);
    }
}
