<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use OpenAI\Client;
use App\Services\ChatGPTService;

class ChatbotController extends Controller
{
    protected $chatbotService;

    public function __construct(ChatbotService $chatbotService)
    {
        $this->chatbotService = $chatbotService;
    }

    public function chat(Request $request)
    {
        $request->validate(['message' => 'required|string']);
        $response = $this->chatbotService->getResponse($request->message);

        return response()->json($response);
    }
}