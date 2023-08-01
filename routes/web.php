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
Route::get('verify/{token}', [RegisterController::class,'verify'])->name('verify');

Route::redirect('/', '/vocabulaire',);
Route::name('vocabulaire.')->prefix('vocabulaire')->controller(VocabulaireController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::get('/show','edit')->name('show');
    Route::post('/store','store')->name('store');
});
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