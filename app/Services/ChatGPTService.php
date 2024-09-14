<?php

namespace App\Services;

use GuzzleHttp\Client;

class ChatGPTService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('OPENAI_API_KEY'); // Add your API key to .env
    }

    public function getResponse($userInput)
    {
        $response = $this->client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer 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',
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [['role' => 'user', 'content' => $userInput]]
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}