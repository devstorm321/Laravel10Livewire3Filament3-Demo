<?php

namespace App\Filament\Resources\HrManagerResource\Pages;

use App\Filament\Resources\HrManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHrManager extends EditRecord
{
    protected static string $resource = HrManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
