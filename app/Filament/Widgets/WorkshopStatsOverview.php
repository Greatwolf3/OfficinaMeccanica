<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use App\Models\Service;
use App\Models\Vehicle;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class WorkshopStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Clienti', Client::count())
                ->description('Clienti registrati')
                ->icon('heroicon-o-users')
                ->color('success'),
            Stat::make('Veicoli', Vehicle::count())
                ->description('Veicoli in officina')
                ->icon('heroicon-o-truck')
                ->color('info'),
            Stat::make('Servizi', Service::count())
                ->description('Interventi registrati')
                ->icon('heroicon-o-wrench-screwdriver')
                ->color('warning'),
            Stat::make('Ricavi totali', '€ '.number_format((float) Service::sum('cost'), 2, ',', '.'))
                ->description('Totale servizi')
                ->icon('heroicon-o-banknotes')
                ->color('primary'),
        ];
    }
}
