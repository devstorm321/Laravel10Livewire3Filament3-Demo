<?php

namespace App\Filament\Resources\Recruitment\CampaignResource\Pages;

use App\Filament\Resources\Recruitment\CampaignResource;
use Filament\Actions;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Pages\ListRecords;

class ListCampaigns extends ListRecords
{
    use ExposesTableToWidgets;
    protected static string $resource = CampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return CampaignResource::getWidgets();
    }
}
