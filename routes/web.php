<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocaliteController;
use App\Http\Controllers\BotManController;



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

Route::get('/', function () {
    return view('auth.login');
});

Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth',[SocaliteController::class,'loginUsingFacebook'])->name('login');
    Route::get('callback',[SocaliteController::class,'callbackFromFacebook'])->name('callback');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/post-like', [App\Http\Controllers\HomeController::class, 'postLike']);

Route::get('/chat', [App\Http\Controllers\HomeController::class, 'chat'])->name('chat');
Route::get('/messages', [App\Http\Controllers\HomeController::class, 'messages'])->name('messages');

Route::post('/messages', [App\Http\Controllers\HomeController::class, 'messageStore'])->name('messageStore');


Route::match (['get','post'], 'botman',[BotManController::class,"handle"]);
