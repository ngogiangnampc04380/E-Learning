<?php

namespace App\Filament\Resources\CourseCategoriesResource\Pages;

use App\Filament\Resources\CourseCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseCategories extends EditRecord
{
    protected static string $resource = CourseCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
