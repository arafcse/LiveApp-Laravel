<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\APIUserController;
use App\Http\Controllers\SocaliteController;
=======
>>>>>>> parent of 3029f11... passport token generated

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
<<<<<<< HEAD

Route::post('login',[APIUserController::class,'userLogin']);
Route::get('login',[APIUserController::class,'userLogin']);
Route::post('register',[APIUserController::class,'userRegister']);


=======
>>>>>>> parent of 3029f11... passport token generated
