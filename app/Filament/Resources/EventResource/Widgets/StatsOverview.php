<?php

namespace App\Filament\Resources\EventResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Event;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total', Event::all()->count())
            ->description('jumlah kegiatan')
            ->descriptionIcon('heroicon-m-calendar'),
            Stat::make('Total', Event::where('category_id', 3)->count())
            ->description('kategori pendidikan')
            ->descriptionIcon('heroicon-o-book-open'),
            Stat::make('Total', Event::where('category_id', 2)->count())
            ->description('kategori Sosial')
            ->descriptionIcon('heroicon-o-chat-bubble-oval-left'),
            Stat::make('Total', Event::where('category_id', 1)->count())
            ->description('kategori Lingkungan')
            ->descriptionIcon('heroicon-o-cube'),
        ];
    }
}
