<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcceptCourseNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $course;
    public function __construct($course)
    {
        //
        $this->course = $course;
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
            ->subject('Khóa học đã được duyệt')
            ->greeting('Xin chào ' . $notifiable->name)
            ->line('Khóa học "' . $this->course->name . '" của bạn đã được duyệt.')
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
