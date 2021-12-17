<?php

use App\Http\Controllers\MentorChatController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MenteeController;
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
Route::get('/events', [EventController::class, 'home'])->name('events');
Route::get('/past/events', [EventController::class, 'userPastEvents'])->name('past.events');
Route::get('/events/patron', [EventController::class, 'joinPatron'])->name('events.patron');
Route::get('/event/{slug}', [EventController::class, 'viewEvent'])->name('event.view');
Route::get('/event/subscribe/{slug}', [EventController::class, 'subscribeEvent'])->name('event.subscribe');

Route::middleware('auth')->group(function (){
    Route::middleware('role:superadministrator|administrator|developer')->group(function (){
        Route::get('/events/add', [EventController::class, 'addEvent'])->name('events.add');
        Route::get('/events/upcoming', [EventController::class, 'upcomingEvents'])->name('events.upcoming');
        Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
        Route::get('/events/past', [EventController::class, 'pastEvents'])->name('events.past');
        Route::get('/event/{id}/subscribers', [EventController::class, 'eventBookings'])->name('event.subscribers');
        Route::get('/admin/events/patrons', [EventController::class, 'eventPatrons'])->name('admin.events.patrons');
        Route::get('/subscribers', [EventController::class, 'mozishaSubscribers'])->name('subscribers');
        Route::get('/subscriber/{id}/profile', [EventController::class, 'eventSubscriber'])->name('subscriber.profile');
        Route::get('/patron/{id}/profile', [EventController::class, 'eventPatron'])->name('patron.profile');
        Route::post('/event_notice/send/{id}', [EventController::class, 'sendCustomNotification'])->name('event.custom.notification');
    });
});





