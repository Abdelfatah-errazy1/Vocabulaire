<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\VocabulaireController;
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

Route::redirect('/', '/vocabulaire',);
Route::name('vocabulaire.')->prefix('vocabulaire')->controller(VocabulaireController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::get('/show','edit')->name('show');
    Route::get('/store','store')->name('store');
});
Route::name('auth.')->prefix('auth')->controller(LoginController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/login','login')->name('login');
    Route::post('/login','store')->name('session');
});