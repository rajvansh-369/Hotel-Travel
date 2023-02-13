<?php

namespace App\Filament\Widgets;

use Filament\Widgets\LineChartWidget;
use App\Models\TimexEvents;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class BookingPendingChart extends LineChartWidget
{
    protected static ?string $heading = 'Pending Booking';
    protected static ?int $sort = 2;
    public ?string $filter = 'today';
    protected function getData(): array
    {


        $data =  Trend::query(TimexEvents::where('status', '0'))
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => date('d-M',strtotime($value->date))),
        ];
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
}
