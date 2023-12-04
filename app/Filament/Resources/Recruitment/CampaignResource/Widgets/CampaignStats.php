<?php

namespace App\Filament\Resources\Recruitment\CampaignResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use App\Filament\Resources\Recruitment\CampaignResource\Pages\ListCampaigns;

class CampaignStats extends BaseWidget
{
    use InteractsWithPageTable;

    protected static ?int $sort = 2;

    protected static ?string $pollingInterval = '10s';


    protected function getTablePage(): string
    {
        return ListCampaigns::class;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Number of campaigns', $this->getPageTableQuery()->count()),
            Stat::make('Number of applications', '12'),
        ];
    }
}
