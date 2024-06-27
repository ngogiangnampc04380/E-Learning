<?php

namespace App\Filament\Resources\CheckCourseResource\Pages;

use App\Filament\Resources\CheckCourseResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Notifications\AcceptCourseNotification;
use App\Notifications\DeclineCourseNotification;
use App\Models\Course;
use Filament\Forms;
class ViewCheckCourse extends ViewRecord
{
    protected static string $resource = CheckCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\EditAction::make(),
           Actions\Action::make('accept')
                    ->label('Duyệt')
                    ->action(function (Course $record) {
                        // Vô hiệu hóa tài khoản
                        $record->status = 2;
                        $record->save();

                        // Gửi thông báo qua email
                        // Lấy thông tin Mentor
                        $mentor = $record->mentor;

                        if ($mentor) {
                            // Lấy thông tin User từ Mentor
                            $user = $mentor->user;

                            if ($user) {
                                // Gửi thông báo qua email
                                $user->notify(new AcceptCourseNotification($record));
                            }
                        }
                    })
                    ->requiresConfirmation()
                    ->color('success'),
                Actions\Action::make('decline')
                    ->label('Không Duyệt')
                    ->form([
                        Forms\Components\TextInput::make('reason')
                            ->label('Lý do không duyệt')
                            ->required(),
                    ])
                    ->action(function (Course $record, $data) {
                        // Vô hiệu hóa tài khoản
                        $record->status = 0;
                        $record->save();

                        // Gửi thông báo qua email
                        // Lấy thông tin Mentor
                        $mentor = $record->mentor;

                        if ($mentor) {
                            // Lấy thông tin User từ Mentor
                            $user = $mentor->user;

                            if ($user) {
                                // Gửi thông báo qua email
                                $user->notify(new DeclineCourseNotification($record, $data['reason']));
                            }
                        }
                    })
                    ->requiresConfirmation()
                    ->color('danger'),
        ];
    }
}
