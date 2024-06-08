<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserDisabledNotification extends Notification
{
    use Queueable;

    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Tài khoản của bạn đã bị vô hiệu hóa')
                    ->greeting('Xin chào ' . $this->user->name)
                    ->line('Tài khoản của bạn đã bị vô hiệu hóa.')
                    ->line('Nếu bạn có bất kỳ thắc mắc nào, vui lòng liên hệ với chúng tôi.')
                    ->line('Cảm ơn bạn!');
    }
}
