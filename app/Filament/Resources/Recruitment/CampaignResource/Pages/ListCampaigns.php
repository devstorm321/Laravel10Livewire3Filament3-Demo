<?php

namespace App\Filament\Resources\Recruitment\CampaignResource\Pages;

use App\Filament\Resources\Recruitment\CampaignResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Concerns\ExposesTableToWidgets;

class ListCampaigns extends ListRecords {
    use ExposesTableToWidgets;

    protected static string $resource = CampaignResource::class;

    protected function getHeaderActions(): array {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array {
        return CampaignResource::getWidgets();
    }
}
