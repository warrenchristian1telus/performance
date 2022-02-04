<?php

namespace App\MicrosoftGraph;

use App\MicrosoftGraph\TokenCache;
use DateInterval;
use DateTime;
use DateTimeZone;
use Microsoft\Graph\Graph;

class SendMail
{
    public function send(array $attendeeAddresses, string $subject, string $body) 
    {

        // Get the access token from the cache
        $tokenCache = new TokenCache();
        $accessToken = $tokenCache->getAccessToken();

        // Create a Graph client
        $graph = new Graph();
        $graph->setAccessToken($accessToken);

        $attendees = [];
        foreach ($attendeeAddresses as $attendeeAddress) {
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
                "subject" => $subject,
                "body" => [
                    "contentType" => "Text",
                    "content" => $body,
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

}
