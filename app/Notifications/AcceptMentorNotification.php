<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcceptMentorNotification extends Notification
{
    use Queueable;

    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Yêu cầu trở thành giảng viên đã được duyệt')
            ->greeting('Xin chào ' . $this->user->name)
            ->line('Yêu cầu trở thành giảng viên của bạn đã được duyệt.')
            ->line('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.')
            ->action('Truy cập', url('/'))
            ->line('Chúc bạn có một ngày tuyệt vời!')
            ->salutation('Trân trọng, ENT-WEB');
    }

    public function toArray(object $notifiable): array
    {
        return [
            // Thêm dữ liệu tùy chọn nếu cần
        ];
    }
}
