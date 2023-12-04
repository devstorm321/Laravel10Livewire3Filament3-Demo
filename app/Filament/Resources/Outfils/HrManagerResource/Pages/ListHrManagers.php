<?php

namespace App\Filament\Resources\Outfils\HrManagerResource\Pages;

use App\Filament\Resources\Outfils\HrManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHrManagers extends ListRecords
{
    protected static string $resource = HrManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
