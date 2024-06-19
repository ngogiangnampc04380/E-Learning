<?php

namespace App\Filament\Resources\CheckCourseResource\Pages;

use App\Filament\Resources\CheckCourseResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCheckCourse extends ViewRecord
{
    protected static string $resource = CheckCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
