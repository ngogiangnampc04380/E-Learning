<?php

namespace App\Filament\Resources\MentorUserResource\Pages;

use App\Filament\Resources\MentorUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMentorUser extends EditRecord
{
    protected static string $resource = MentorUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
