<?php

namespace App\Filament\Resources\CheckCourseResource\Pages;

use App\Filament\Resources\CheckCourseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCheckCourses extends ListRecords
{
    protected static string $resource = CheckCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
