<?php

namespace App\Filament\Resources\OderDetallResource\Pages;

use App\Filament\Resources\OderDetallResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOderDetall extends EditRecord
{
    protected static string $resource = OderDetallResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
