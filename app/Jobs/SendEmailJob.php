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

    public $toRecipients;       /* array of user id */
    public $sender_id;          /* user id (Model: User) */

    public $subject;            /* String */
    public $body;               /* String */
    public $bodyContentType;    /* text or html, default is 'html' */

    // Generic Template 
    public $template;           /* String - name of the template */
    public $bindvariables;      

    // Option 
    public $importance;         /* low, normal, and high. */
    public $saveToSentItems;    /* Boolean -- true or false */

    // Audit Log related
    public $saveToLog;          /* Boolean -- true or false */
    public $alertType;
    public $alertFormat;
    
    // Default email for Testing purpose (sent any email to this email)
    public $SendToTestAccount;  /* jpoon@extest.gov.bc.ca */

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

        $this->saveToLog = true;

        $this->alertType = 'N';  /* Notification */
        $this->alertFormat = 'E';   /* E = E-mail, A = In App */
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

         echo 'Queued Job Id:'. $this->job->getJobId() . ' ';

        //
        $sendMail = new SendMail();
        $sendMail->toRecipients = $this->toRecipients;
        $sendMail->sender_id = $this->sender_id;
        $sendMail->subject = $this->subject;
        $sendMail->body = $this->body;
        $sendMail->saveToLog = $this->saveToLog;
        $sendMail->alertFormat = $this->alertFormat;
        $sendMail->alertType = $this->alertType;

        if ($this->template) {
            $sendMail->template = $this->template;
            $sendMail->bindvariables = $this->bindvariables;
    
            $response = $sendMail->sendMailWithGenericTemplate();
        } else {
            $response = $sendMail->sendMailWithoutGenericTemplate();
        }

        //return $this->job->getJobId();

    }
}
