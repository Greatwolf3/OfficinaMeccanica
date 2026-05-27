<?php

namespace App\Filament\Resources\Clients\RelationManagers;

use Filament\Actions;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class VehiclesRelationManager extends RelationManager
{
    protected static string $relationship = 'vehicles';

    protected static ?string $title = 'Veicoli';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('brand')
                    ->required()
                    ->label('Marca')
                    ->maxLength(255),
                Forms\Components\TextInput::make('model')
                    ->required()
                    ->label('Modello')
                    ->maxLength(255),
                Forms\Components\TextInput::make('year')
                    ->required()
                    ->label('Anno')
                    ->numeric(),
                Forms\Components\TextInput::make('license_plate')
                    ->required()
                    ->label('Targa')
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brand')
                    ->label('Marca')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('model')
                    ->label('Modello')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('year')
                    ->label('Anno')
                    ->sortable(),
                Tables\Columns\TextColumn::make('license_plate')
                    ->label('Targa')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Actions\CreateAction::make(),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
