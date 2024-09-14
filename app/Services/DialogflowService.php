<?php

namespace App\Services;

use Google\Cloud\Dialogflow\V2\SessionsClient;

class DialogflowService
{
    protected $projectId;

    public function __construct()
    {
        $this->projectId = env('DIALOGFLOW_PROJECT_ID');
    }

    public function detectIntent($text, $sessionId)
    {
        $client = new SessionsClient();
        $session = $client->sessionName($this->projectId, $sessionId);

        $queryInput = [
            'text' => [
                'text' => $text,
                'language_code' => 'fr', // Change to 'en' for English
            ]
        ];

        $response = $client->detectIntent($session, $queryInput);
        return $response->getQueryResult()->getFulfillmentText();
    }
}