<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenizerRequest;
use App\Services\TokenizerService;

class TokenizerController extends Controller
{
    protected $tokenizerService;

    public function __construct(TokenizerService $tokenizerService)
    {
        $this->tokenizerService = $tokenizerService;
    }
    // Display the tokenizer view when the 'index' route is accessed
    public function index()
    {
        return view('tokenizer');
    }
    // Tokenize the input string when a POST request is made to the 'tokenize' route
    public function tokenize(TokenizerRequest $request)
    {
        $inputString = $request->inputString;
        try {
            $tokens = $this->tokenizerService->tokenizerService($inputString);
            return response()->json(['tokens' => $tokens]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }
}
