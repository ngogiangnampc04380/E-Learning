<?php

namespace App\Filament\Resources\CourseCategoriesResource\Pages;

use App\Filament\Resources\CourseCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourseCategories extends ListRecords
{
    protected static string $resource = CourseCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
