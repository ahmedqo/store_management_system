<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail as Mailer;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\Reset as ResetMail;
use Illuminate\Bus\Queueable;
use App\Functions\Mail;

class MailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $type;
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type, $data)
    {
        $this->type = $type;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch ($this->type) {
            case Mail::FORGOT:
                $mail = new ResetMail(['token' => $this->data['token']]);
                return Mailer::to($this->data['email'])->send($mail);
        }
    }
}
