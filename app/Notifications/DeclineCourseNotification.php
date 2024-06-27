<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeclineCourseNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    private $course;
    private $reason;

    public function __construct($course, $reason)
    {
        //
        $this->course = $course;
        $this->reason = $reason;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Khóa học không được duyệt')
            ->greeting('Xin chào ' . $notifiable->name)
            ->line('Khóa học "' . $this->course->name . '" của bạn không được duyệt với lý do sau:')
            ->line($this->reason)
            ->line('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
