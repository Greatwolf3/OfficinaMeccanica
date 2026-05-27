<?php

namespace App\Filament\Resources\Vehicles\RelationManagers;

use Filament\Actions;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ServicesRelationManager extends RelationManager
{
    protected static string $relationship = 'services';

    protected static ?string $title = 'Servizi';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label('Descrizione')
                    ->rows(3),
                Forms\Components\TextInput::make('cost')
                    ->required()
                    ->label('Costo')
                    ->numeric()
                    ->prefix('€'),
                Forms\Components\DatePicker::make('date')
                    ->required()
                    ->label('Data'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description')
                    ->label('Descrizione')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('cost')
                    ->label('Costo')
                    ->money('EUR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->label('Data')
                    ->date()
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
