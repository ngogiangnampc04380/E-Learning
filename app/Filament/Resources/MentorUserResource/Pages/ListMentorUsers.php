<?php

namespace App\Filament\Resources\MentorUserResource\Pages;

use App\Filament\Resources\MentorUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMentorUsers extends ListRecords
{
    protected static string $resource = MentorUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
