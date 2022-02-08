<?php

namespace App\MicrosoftGraph;

use DateTime;
use DateInterval;
use DateTimeZone;
use GuzzleHttp\Client;
use Microsoft\Graph\Graph;
use App\Models\GenericTemplate;
use App\MicrosoftGraph\TokenCache;

class SendMail
{

    public $attendeeAddresses;
    public $subject;
    public $body;

    public $azure_id;
    public $template;
    public $bindvariables;

    public function __construct() 
    {
        $this->attendeeAddresses = [];
        $this->bindvariables = [];
    }

    public function send() 
    {

        // Get the access token from the cache
        $tokenCache = new TokenCache();
        $accessToken = $tokenCache->getAccessToken();

        // Create a Graph client
        $graph = new Graph();
        $graph->setAccessToken($accessToken);

        $attendees = [];
        foreach ($this->attendeeAddresses as $attendeeAddress) {
            array_push($attendees, [
                // Add the email address in the emailAddress property
                'emailAddress' => [
                    'address' => $attendeeAddress,
                ],
            ]);
        }

        // Build message
        $newMessage = [
            "message" => [
                "subject" => $this->subject,
                "body" => [
                    "contentType" => "HTML",
                    "content" => $this->body,
                ],
                'toRecipients' => $attendees
            ],
            "saveToSentItems" => "true",
        ];

        //  User - API https://graph.microsoft.com/v1.0/me/sendMail
        $sendMailUrl = '/me/sendMail';
        $response = $graph->createRequest('POST', $sendMailUrl)
            ->addHeaders(['Prefer' => 'outlook.timezone="Pacific Standard Time"'])
            ->attachBody($newMessage)
            ->execute();

        return $response;

    }


    public function sendMailWithGenericTemplate() 
    {

        $generic_template = GenericTemplate::where('template',$this->template)->first(); 

        // Bind variable
        $keys = $generic_template->binds->pluck('bind')->toArray();

        $this->azure_id = $generic_template->azure_id;
        $this->subject = str_replace( $keys, $this->bindvariables, $generic_template->subject);
        $this->body = str_replace( $keys, $this->bindvariables, $generic_template->body);

        switch ($generic_template->sender) {
            case 1:
                return $this->send();
                break;
            case 2:    
                return $this->sendMailUsingApplicationToken();
                break;
        }

        // if ($generic_template->sender == 1) {
        //     return $this->send();
        // }

        // if ($generic_template->sender == 2) {
        //     return $this->sendMailUsingApplicationToken();
        // }   

    }

    public function sendMailUsingApplicationToken() 
    {
        $accessToken = $this->getAccessToken();

        // Create a Graph client
        $graph = new Graph();
        $graph->setAccessToken($accessToken);

        $attendees = [];
        foreach ($this->attendeeAddresses as $attendeeAddress) {
            array_push($attendees, [
                // Add the email address in the emailAddress property
                'emailAddress' => [
                    'address' => $attendeeAddress,
                ],
            ]);
        }

        // Build message
        $newMessage = [
            "message" => [
                "subject" => $this->subject,
                "body" => [
                    "contentType" => "Text",
                    "content" => $this->body,
                ],
                'toRecipients' => $attendees
            ],
            "saveToSentItems" => "true",
        ];

        //  User - API https://graph.microsoft.com/v1.0/users/{id}/sendMail
        $sendMailUrl = '/users/' . $this->azure_id . '/sendMail';
        $response = $graph->createRequest('POST', $sendMailUrl)
            ->addHeaders(['Prefer' => 'outlook.timezone="Pacific Standard Time"'])
            ->attachBody($newMessage)
            ->execute();

        return $response;

    }

    protected function getAccessToken()
    {

        $client = new client;
        $endpoint = env('OAUTH_AUTHORITY').env('OAUTH_TOKEN_ENDPOINT');

        try {

            $response = $client->request('POST', $endpoint, [
                'form_params' => [
                    'client_id' => env('OAUTH_APP_ID'),
                    'client_secret' => env('OAUTH_APP_PASSWORD'),
                    'scope' => 'https://graph.microsoft.com/.default',
                    'grant_type' => 'client_credentials',
                ] 
            ]);


            $contents = $response->getBody()->getContents();
            $token_array = json_decode($contents, true);
            
            return $token_array['access_token'];

        }
        catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();

            echo $respose;
            echo $responseBodyAsString;
            // To Do -- notify administrator about the process failure
            exit(1);

        }

    }

}
