<?php

namespace App\Filament\Resources\OderDetallResource\Pages;

use App\Filament\Resources\OderDetallResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOderDetalls extends ListRecords
{
    protected static string $resource = OderDetallResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
