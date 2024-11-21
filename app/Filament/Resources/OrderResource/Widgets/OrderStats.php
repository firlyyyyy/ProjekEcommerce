<?php

namespace App\Filament\Resources\OrderResource\Widgets;

// use Filament\Widgets\ChartWidget;
use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Illuminate\Support\Number;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Orders', Order::query()->where('status', 'new')->count()),
            Stat::make('Order Processing', Order::query()->where('status', 'processing')->count()),
            Stat::make('Order Shipped', Order::query()->where('status', 'shipped')->count()),
            Stat::make('Average Price', function () {
                $average = Order::query()->avg('grand_total');
                return 'Rp. ' . number_format($average, 0, ',', '.');
            })
        ];
    }
}
