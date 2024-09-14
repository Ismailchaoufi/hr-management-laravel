<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;

class DialogflowController extends Controller
{
    protected $projectId;
    protected $languageCode;

    public function __construct()
    {
        $this->projectId = env('DIALOGFLOW_PROJECT_ID');
        $this->languageCode = env('DIALOGFLOW_LANGUAGE_CODE', 'fr-FR');
    }

    public function handleChat(Request $request)
    {
        $message = $request->input('message');

        $response = $this->detectIntent($message);

        return response()->json(['reply' => $response]);
    }

    private function detectIntent($message)
    {
        // Set up the Dialogflow client
        $sessionsClient = new SessionsClient([
            'credentials' => json_decode(file_get_contents(base_path('public/google_cloud_credentials/credentials.json')), true)
        ]);

        // Set up the session
        $session = $sessionsClient->sessionName($this->projectId, uniqid());

        // Create the text input
        $textInput = new TextInput();
        $textInput->setText($message);
        $textInput->setLanguageCode($this->languageCode);

        // Create the query input
        $queryInput = new QueryInput();
        $queryInput->setText($textInput);

        // Get the response
        $response = $sessionsClient->detectIntent($session, $queryInput);

        // Get the fulfillment text
        $fulfillmentText = $response->getQueryResult()->getFulfillmentText();

        $sessionsClient->close();

        return $fulfillmentText;
    }
}