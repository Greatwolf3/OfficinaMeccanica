<?php

namespace App\Filament\Widgets;

use App\Models\Service;
use Filament\Widgets\ChartWidget;

class MonthlyRevenueChart extends ChartWidget
{
    protected ?string $heading = 'Ricavi mensili';

    protected function getData(): array
    {
        $months = collect(range(5, 0))->map(fn (int $monthsAgo) => now()->subMonths($monthsAgo));

        return [
            'datasets' => [
                [
                    'label' => 'Ricavi',
                    'data' => $months->map(fn ($month) => (float) Service::query()
                        ->whereYear('date', $month->year)
                        ->whereMonth('date', $month->month)
                        ->sum('cost'))
                        ->all(),
                    'backgroundColor' => '#f59e0b',
                    'borderColor' => '#d97706',
                ],
            ],
            'labels' => $months->map(fn ($month) => $month->translatedFormat('M Y'))->all(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
