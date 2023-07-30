<?php

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
    Route::get('/create','index')->name('create');
    Route::get('/show','edit')->name('show');
});