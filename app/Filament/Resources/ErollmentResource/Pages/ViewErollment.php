<?php

namespace App\Filament\Resources\ErollmentResource\Pages;

use App\Filament\Resources\ErollmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewErollment extends ViewRecord
{
    protected static string $resource = ErollmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
