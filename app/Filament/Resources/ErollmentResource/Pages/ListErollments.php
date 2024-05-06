<?php

namespace App\Filament\Resources\ErollmentResource\Pages;

use App\Filament\Resources\ErollmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListErollments extends ListRecords
{
    protected static string $resource = ErollmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
