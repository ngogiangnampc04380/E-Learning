<?php

namespace App\Filament\Resources\CourseCategoriesResource\Pages;

use App\Filament\Resources\CourseCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCourseCategories extends ViewRecord
{
    protected static string $resource = CourseCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
