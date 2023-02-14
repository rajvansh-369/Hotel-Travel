<?php

namespace App\Filament\Widgets;

use App\Models\TimexEvents;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class BookingOverview extends BaseWidget
{
    protected static ?int $sort = -3;

    protected function getCards(): array
    {
        $totalBooking = TimexEvents::get()->count();

        return [
            Card::make('Total Bookings', $totalBooking),
        ];
    }
}
