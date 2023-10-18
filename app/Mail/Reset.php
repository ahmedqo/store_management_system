<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class Reset extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($data)
    {
        $this->data = $data;
        $this->from =  [
            'address' => env('MAIL_NOREPLAY_ADDRESS'),
            'name' => env('MAIL_FROM_NAME'),
        ];
    }

    public function build()
    {
        return $this->subject(__('Reset Password'))->from($this->from)->view('mail.reset');
    }
}
