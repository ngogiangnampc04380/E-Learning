<?php

namespace App\Filament\Resources\ErollmentResource\Pages;

use App\Filament\Resources\ErollmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditErollment extends EditRecord
{
    protected static string $resource = ErollmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): ?string
    {
      return $this->getResource()::getUrl('index')   ;
    }
}
