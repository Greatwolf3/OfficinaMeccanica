<?php

namespace App\Filament\Resources\Clients\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

/**
 * Tabella clienti (multilingua)
 */
class ClientsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->label(__('filament-resources.client.table.name'))
                    ->searchable(),

                TextColumn::make('phone')
                    ->label(__('filament-resources.client.table.phone'))
                    ->searchable(),

                TextColumn::make('email')
                    ->label(__('filament-resources.client.table.email'))
                    ->searchable(),

                TextColumn::make('address')
                    ->label(__('filament-resources.client.table.address'))
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label(__('filament-resources.client.table.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label(__('filament-resources.client.table.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([
                //
            ])

            ->actions([
                EditAction::make(),
            ])

            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
