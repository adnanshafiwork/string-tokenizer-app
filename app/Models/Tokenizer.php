<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tokenizer extends Model
{
    use HasFactory;

    protected $fillable = ['input_string','output_tokens'];
}
