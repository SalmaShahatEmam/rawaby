<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AlphaMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;
    public $subject;

    /**
     * Create a new message instance.
     */
    public function __construct($data /* , $subject */)
    {
        $this->data = $data;
        $this->subject = "Reply to your message";
    }



    public function build()
    {
        return $this->markdown('mail.reply-contact')
              ->with('data', $this->data);
    }

    //add subject to your mail

    public function subject($subject)
    {
        return $this->subject($subject);
    }


}
