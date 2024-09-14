<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DialogflowService;

class ChatController extends Controller
{
    protected $dialogflow;

    public function __construct(DialogflowService $dialogflow)
    {
        $this->dialogflow = $dialogflow;
    }

    public function chat(Request $request)
    {
        $request->validate(['message' => 'required|string']);
        $sessionId = uniqid();
        $responseText = $this->dialogflow->detectIntent($request->message, $sessionId);
        return response()->json($responseText);
    }
}