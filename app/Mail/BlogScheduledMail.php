<?php

namespace App\Mail;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BlogScheduledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $blog;

    public function __construct( Blog $blog )
    {
        $this->blog = $blog;
    }

    public function build ()
    {
        return $this->subject('Your Blog is Scheduled')
                    ->view('emails.blog-scheduled')
                    ->with(['blog' => $this->blog]);
    }
}
