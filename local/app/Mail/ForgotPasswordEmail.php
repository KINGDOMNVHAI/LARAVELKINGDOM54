<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPasswordEmail extends Mailable implements ShouldQueue
{
    protected $mang;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.demo')
            ->subject('this is test email subject')  //<= how to pass variable on this subject
            ->with([
                'title'     => $this->blog->title, //this works without queue
                'content'     => $this->blog->title, //this works without queue
            ]);
    }
}
