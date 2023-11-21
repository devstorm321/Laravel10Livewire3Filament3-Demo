<?php

namespace App\Filament\Resources\HrManagerResource\Pages;

use App\Filament\Resources\HrManagerResource;
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
