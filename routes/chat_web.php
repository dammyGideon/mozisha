<?php

use App\Http\Controllers\MenteeChatController;
use App\Http\Controllers\MentorChatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth')->group(function (){

    Route::middleware('role:mentor|administrator|superadministrator|developer')->group(function () {
        Route::get('/mentor/chatroom/{connect_id}', [MentorChatController::class, 'chat'])->name('mentor.chatroom');
        Route::post('/mentor/send', [MentorChatController::class, 'send'])->name('mentor.chat.send');
        Route::post('/mentor/saveToSession', [MentorChatController::class, 'saveToSession']);
        Route::post('/mentor/deleteSession', [MentorChatController::class, 'deleteSession']);
        Route::get('/mentor/getOldMessages', [MentorChatController::class, 'getOldMessages']);
    });

    Route::middleware('role:mentee|administrator|superadministrator|developer')->group(function () {
        Route::get('/mentee/chatroom/{connect_id}', [MenteeChatController::class, 'chat'])->name('mentee.chatroom');
        Route::post('/mentee/send', [MenteeChatController::class, 'send'])->name('mentee.chat.send');
        Route::post('/mentee/saveToSession', [MenteeChatController::class, 'saveToSession']);
        Route::post('/mentee/deleteSession', [MenteeChatController::class, 'deleteSession']);
        Route::get('/mentee/getOldMessages', [MenteeChatController::class, 'getOldMessages']);
    });

});
