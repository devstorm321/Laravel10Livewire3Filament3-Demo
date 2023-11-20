<?php

namespace App\Filament\Resources\RhUserResource\Pages;

use App\Filament\Resources\RhUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRhUsers extends ListRecords
{
    protected static string $resource = RhUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
