<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', LoginController::class);

Route::get('/users',[UserController::class,"index"]);
Route::post('/users',[UserController::class,"store"]);
Route::get('/users/{id}',[UserController::class,"show"]);
Route::put('/users/{id}', [UserController::class, "update"]);
Route::delete('/users/{id}', [UserController::class, "destroy"]);

Route::get('/answers',[AnswerController::class,"index"]);
Route::post('/answers',[AnswerController::class,"store"]);
Route::get('/answers/{id}',[AnswerController::class,"show"]);
Route::put('/answers/{id}', [AnswerController::class, "update"]);
Route::delete('/answers/{id}', [AnswerController::class, "destroy"]);


Route::get('/questions',[QuestionController::class,"index"]);
Route::post('/questions',[QuestionController::class,"store"]);
Route::get('/questions/{id}',[QuestionController::class,"show"]);
Route::put('/questions/{id}', [QuestionController::class, "update"]);
Route::delete('/questions/{id}', [QuestionController::class, "destroy"]);