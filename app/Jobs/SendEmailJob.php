<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\Mail\MessageMail;

class SendEmailJob extends Job
{
    public $dataEmail;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($dataEmail)
    {
        $this->dataEmail = $dataEmail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->dataEmail['to'])->send(new MessageMail($this->dataEmail));     
    }
}
