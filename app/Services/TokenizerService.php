<?php

namespace App\Services;

use App\Models\Tokenizer;
use Illuminate\Support\Facades\DB;

class TokenizerService
{
    public function tokenizerService($inputString)
    {
        try {
            DB::beginTransaction();
            $inputString = str_replace(' ', '', $inputString);
            $pattern = '/[\[\]{}(),]+/';
            $tokens = preg_split($pattern, $inputString, -1, PREG_SPLIT_NO_EMPTY);
            $tokensAsString = implode(' ', $tokens);
            // Store input and output in the database
            $inputOutput = new Tokenizer();
            $inputOutput->input_string = $inputString;
            $inputOutput->output_tokens = $tokensAsString;
            $inputOutput->save();
            DB::commit();
            return $tokens;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
