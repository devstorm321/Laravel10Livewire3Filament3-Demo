<?php

namespace App\Filament\Resources\Outfils\HrManagerResource\Pages;

use App\Filament\Resources\Outfils\HrManagerResource;
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
