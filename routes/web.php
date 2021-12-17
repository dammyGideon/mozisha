<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


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

Route::get('checkout',[CheckoutController::class, 'checkout']);
Route::post('checkout',[CheckoutController::class, 'afterpayment'])->name('checkout.credit-card');

Route::get('/',               [UserPageController::class, 'home'])->name('homepage');

Route::get('/login',          [LoginController::class, 'login'])->name('login');

Route::get('/user/login',          [LoginController::class, 'login'])->name('user.login');

Route::post('/contact-us',          [LoginController::class, 'message'])->name('user.message');

Route::get('/reset',           [LoginController::class, 'reset'])->name('password.reset');

Route::get('/about',           [UserPageController::class, 'about'])->name('about');

Route::post('/getUser',        [UserController::class, 'validateUser']); //User validation API


/*
|--------------------------------------------------------------------------
| More Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. This leads to the details
| available on this software
|
*/
Route::get('/courses/more',   [UserPageController::class, 'coursesMore'])->name('courses.more');

Route::get('/app/more',       [UserPageController::class, 'appMore'])->name('app.more');

Route::get('/col/more',       [UserPageController::class, 'colMore'])->name('col.more');

Route::get('/free/more',       [UserPageController::class, 'freeMore'])->name('free.more');




Route::get('/blog',                        [UserPageController::class, 'blog'])->name('blog');
Route::get('/blog/category/{category}',    [UserPageController::class, 'blogCategory'])->name('blog.category');


Route::get('/team',           [UserPageController::class, 'team'])->name('team');
Route::get('/team/{id}/details',      [UserPageController::class, 'teamView'])->name('team.view');

/*
 * Testimonials and others.
 */
Route::get('/testimonials',           [UserPageController::class, 'testimonials'])->name('testimonials');

Route::get('user/paystackReg',[RegisterController::class,'paystackReg']);
Route::post('user/paystackReg',[RegisterController::class,'Pay']);
Route::post('user/handleGatewayCallback',[RegisterController::class,'handleGatewayCallback']);

Route::get('/coming_soon',    [UserPageController::class, 'soon'])->name('coming_soon');
Route::get('/mozilearn/coming_soon',    [UserPageController::class, 'mozilearnSoon'])->name('mozilearn.coming_soon');
Route::get('/mozilance/coming_soon',    [UserPageController::class, 'mozilanceSoon'])->name('mozilance.coming_soon');
Route::get('/account',        [UserPageController::class, 'accountType'])->name('user.account');
Route::get('/checkuser',      [UserController::class, 'checkUser'])->name('user.check');
Route::get('/logout',         [LoginController::class, 'logout'])->name('logout');
Route::get('/blog/{slug}', [BlogController::class, 'userView'])->name('blog.view');

/*
|--------------------------------------------------------------------------
| Social authentication Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the Socialite class within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/auth/google/user/{google_id}/password', [UserController::class, 'selectGooglePassword'])->name('user.google.password');


Route::get('/auth/google/callback', [UserController::class, 'handleGoogleCallback'])->name('auth.google.callback');
Route::get('/auth/mentor/google',   [UserController::class, 'redirectMentorToGoogle'])->name('auth.mentor.google');
Route::get('/auth/mentee/google',   [UserController::class, 'redirectMenteeToGoogle'])->name('auth.mentee.google');
Route::get('/auth/google',          [UserController::class, 'redirectToGoogle'])->name('auth.google');
