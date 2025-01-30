<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BlogNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $blog;

    public function __construct($blog)
    {
        $this->blog = $blog;

      //  dd($blog);
    }

    public function build()
    {

                    return $this->markdown('mail.blogNotification')
                    ->with('data', $this->blog);
          
    }
}
