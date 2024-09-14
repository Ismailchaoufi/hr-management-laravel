<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class OpenAIController extends Controller
{


public function askQuestion(Request $request) {
    $question = $request->input('question');

    try {
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $question,
            'max_tokens' => 150,
        ]);

        return response()->json([
            'answer' => $result['choices'][0]['text'],
        ]);
    } catch (\Exception $e) {
        \Log::error('OpenAI error: ' . $e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
}
