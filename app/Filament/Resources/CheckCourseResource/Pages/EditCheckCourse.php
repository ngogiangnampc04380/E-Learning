<?php

namespace App\Filament\Resources\CheckCourseResource\Pages;

use App\Filament\Resources\CheckCourseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCheckCourse extends EditRecord
{
    protected static string $resource = CheckCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
