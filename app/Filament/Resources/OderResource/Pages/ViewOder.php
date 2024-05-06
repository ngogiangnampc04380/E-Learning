<?php

namespace App\Filament\Resources\OderResource\Pages;

use App\Filament\Resources\OderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOder extends ViewRecord
{
    protected static string $resource = OderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
