<?php

namespace App\Filament\Resources\ReplyCommentCourseResource\Pages;

use App\Filament\Resources\ReplyCommentCourseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReplyCommentCourses extends ListRecords
{
    protected static string $resource = ReplyCommentCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
