<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\MicrosoftGraph\SendMail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $toAddresses;
    public $sender_id;

    // Generic Template 
    public $template;
    public $bindvariables;



    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->toRecipients = [];
        $this->bindvariables = [];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $sendMail = new SendMail();
        //$sendMail->toAddresses = $this->toAddresses;
        $sendMail->toRecipients = $this->toRecipients;
        $sendMail->sender_id = $this->sender_id;
        $sendMail->template = $this->template;
        $sendMail->bindvariables = $this->bindvariables;
        $response = $sendMail->sendMailWithGenericTemplate();
    }
}
