<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Http\Requests\ContactRequest;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ThanksMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('amministrazione@ristozoo.it')->view('mails.thanksMail', ['request' => $this->request]);
    }
}
