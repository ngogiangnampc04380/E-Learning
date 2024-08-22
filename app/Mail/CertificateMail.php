<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CertificateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $course;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $course)
    {
        $this->name = $name;
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.certificate')
                    ->subject('Chứng chỉ hoàn thành khóa học')
                    ->with([
                        'name' => $this->name,
                        'course' => $this->course,
                    ]);
    }
}
