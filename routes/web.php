<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\VocabulaireController;
use Illuminate\Support\Facades\Auth;
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
// Auth::routes(
//     ['verify' => true]
// );
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\QuizController;

Route::group(['middleware' => 'web'], function () {
    // Your Socialite routes here
    Route::get('login/google', [SocialController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [SocialController::class, 'handleGoogleCallback'])->name('google.callback');
    Route::get('login/facebook', [SocialController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('login/facebook/callback', [SocialController::class, 'handleFacebookCallback'])->name('facebook.callback');
    
    Route::get('login/github', [SocialController::class, 'redirectToGithub'])->name('login.github');
    Route::get('login/github/callback', [SocialController::class, 'handleGithubCallback'])->name('github.callback');

    Route::get('login/linkedin', [SocialController::class, 'redirectToLinkedIn'])->name('login.linkedin');
    Route::get('login/linkedin/callback', [SocialController::class, 'handleLinkedInCallback']);
    
    Route::name('vocabulaire.')->prefix('vocabulaire')->controller(VocabulaireController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::get('/show','edit')->name('show');
        Route::post('/store','store')->name('store');
    });
    Route::name('quizzes.')->prefix('quizzes')->controller(QuizController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::get('/show','edit')->name('show');
        Route::post('/store','store')->name('store');
    });
});
    
    Route::get('verify/{token}', [RegisterController::class,'verify'])->name('verify');
    
Route::redirect('/', '/vocabulaire',);
Route::name('auth.')->prefix('auth')->controller(LoginController::class)->group(function(){
    Route::get('/login','login')->name('login');
    Route::post('/login','store')->name('session');
    Route::get('/logout','logout')->name('logout');
});
Route::name('auth.')->prefix('auth')->controller(RegisterController::class)->group(function(){
    Route::get('/register','create')->name('create');
    Route::post('/register','store')->name('register');
});
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('emails.verification');
})->middleware('auth')->name('verification.notice');