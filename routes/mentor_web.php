<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenteeController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\MentorshipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPageController;
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
Route::get('/mentor/register', [MentorController::class, 'mentorRegister'])->name('mentor.register');


Route::middleware('auth')->group(function (){
    Route::middleware('role:mentor|administrator|superadministrator|developer')->group(function (){
        Route::get('/mentor/dashboard',           [MentorController::class, 'mentorDashboard'])->name('mentor.dashboard');
        Route::get('/mentor/profile',             [MentorController::class, 'mentorProfileSettings'])->name('mentor.profile.settings');
        Route::get('/mentor/info',                [MentorController::class, 'mentorProfile'])->name('mentor.profile');
        Route::get('/mentor/new_task',            [MentorController::class, 'newTask'])->name('mentor.new.task');
        Route::get('/mentor/profile/update',      [MentorController::class, 'mentorProfileSettings'])->name('mentor.profile.update');
        Route::get('/mentor/apprenticeship/new',  [MentorController::class, 'newApprenticeship'])->name('mentor.apprenticeship.new');
        Route::get('/mentor/{id}/{req}/mentee',   [MentorController::class, 'viewMentee'])->name('mentor.mentee.view');
        Route::get('/acceptance/{id}/success',    [MentorController::class, 'acceptanceSuccess'])->name('mentor.accepted');
        Route::get('/mentor/apprenticeships',     [MentorController::class, 'apprenticeships'])->name('mentor.apprenticeships');
        Route::get('mentor/apprenticeship/{id}',  [MentorController::class, 'viewApprenticeship'])->name('mentor.apprenticeship.view');


        /**
         * Apprenticeship platform routes
         */
        Route::get('/mentor/{id}/app',/*id = connect_id*/                  [MentorshipController::class, 'mentorAppDashboard'])->name('mentor.app.dashboard');
        Route::get('/mentor/{id}/goal',/*id = connect_id*/                 [MentorshipController::class, 'appGoal'])->name('mentor.app.goal');
    });

    //Common route between Mentors and Mentees
    Route::middleware('role:mentor|mentee|administrator|superadministrator|developer')->group(function (){
        Route::get('/meeting/{id}',        [MentorController::class, 'viewMeeting'])->name('mentor.meeting.view');
    });
});




