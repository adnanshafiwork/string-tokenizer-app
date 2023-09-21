<?php

use App\Http\Controllers\TokenizerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/tokenizer',[TokenizerController::class,'index'])->name('tokenizer.index');
Route::post('/tokenizer/tokenize',[TokenizerController::class,'tokenize'])->name('tokenizer.tokenize');
