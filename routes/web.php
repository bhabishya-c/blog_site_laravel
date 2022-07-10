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
Route::get('/adminhome',[PostController::class,'adminindex']);
Route::get('/userhome',[PostController::class,'userindex']);
Route::get('/',[LoginController::class,'create']);
Route::post('/login',[LoginController::class,'store'])->middleware('loginvalidate');
Route::get('/adduserform',[RegisterController::class,'create']);
Route::post('/adduser',[RegisterController::class,'store'])->middleware('registervalidate');
Route::get('/adminform',[PostController::class,'admincreate']);
Route::get('/userform',[PostController::class,'usercreate']);
Route::get('/logout',[LogoutController::class,'logout']);

Route::middleware(['postvalidate'])->group(function(){
    Route::post('/adminpost',[PostController::class,'store']);
    Route::post('/userpost',[PostController::class,'store']);
});


