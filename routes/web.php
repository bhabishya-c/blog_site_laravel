<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


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
Route::post('/login',[LoginController::class,'login']);
Route::post('/login',[LoginController::class,'store']);
Route::get('/adduserform',[RegisterController::class,'create']);
Route::post('/adduser',[RegisterController::class,'store']);
Route::get('/adminform',[PostController::class,'admincreate']);
Route::get('/userform',[PostController::class,'usercreate']);
Route::get('/logout',[LogoutController::class,'logout']);
Route::post('/adminpost',[PostController::class,'store']);
Route::post('/userpost',[PostController::class,'store']);




