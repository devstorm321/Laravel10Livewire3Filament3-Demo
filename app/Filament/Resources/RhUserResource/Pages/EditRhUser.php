<?php

namespace App\Filament\Resources\RhUserResource\Pages;

use App\Filament\Resources\RhUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRhUser extends EditRecord
{
    protected static string $resource = RhUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
