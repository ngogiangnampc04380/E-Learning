<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserRestoredNotification extends Notification
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
                    ->subject('Tài khoản của bạn đã được khôi phục')
                    ->greeting('Xin chào ' . $this->user->name)
                    ->line('Tài khoản của bạn đã được khôi phục thành công.');
    }
}
