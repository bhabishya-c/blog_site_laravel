<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LoginValidate;
use App\Http\Middleware\PostValidation;
use App\Http\Middleware\RegistrationValidation;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;


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

Route::get('/',[LoginController::class,'create']);
Route::post('/login',[LoginController::class,'store'])->middleware('loginvalidate');



