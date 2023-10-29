<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function (){

    Route::get('conversation',[ConversationController::class,'index']);
    Route::get('conversation/{conversation}',[ConversationController::class,'show']);


    Route::get('conversation/{conversation}/participants',[ConversationController::class,'addParticipant']);
    Route::post('conversation/{conversation}/participants',[ConversationController::class,'removeParticipant']);



    Route::get('conversation/{id}/messages',[MessageController::class,'index']);
    Route::post('messages',[MessageController::class,'store'])
    ->name('api.messages.store');
    Route::delete('messages/{id}',[MessageController::class,'destroy']);


});
