<?php

namespace App\Filament\Resources\OderDetallResource\Pages;

use App\Filament\Resources\OderDetallResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOderDetall extends ViewRecord
{
    protected static string $resource = OderDetallResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
