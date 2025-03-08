<?php

namespace App\Mail;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BlogPublishedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $blog;

    public function __construct( Blog $blog )
    {
        $this->blog = $blog;
    }

    public function build() 
    {
        return $this->subject('Your Blog is Published')
                    ->view('emails.blog-published')
                    ->with([
                        'blog'  => $this->blog
                    ]);
    }
}
