<?php

namespace App\Filament\Widgets;

use App\Models\Service;
use Filament\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentServicesTable extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return Service::query()
            ->with('vehicle.client')
            ->latest('date')
            ->limit(10);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('vehicle.client.name')
                ->label('Cliente')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('vehicle.brand')
                ->label('Marca')
                ->searchable(),
            Tables\Columns\TextColumn::make('vehicle.model')
                ->label('Modello')
                ->searchable(),
            Tables\Columns\TextColumn::make('vehicle.license_plate')
                ->label('Targa')
                ->searchable(),
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
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('view')
                ->label('Visualizza')
                ->icon('heroicon-o-eye')
                ->url(fn (Service $record): string => route('filament.admin.resources.services.edit', $record)),
        ];
    }
}
