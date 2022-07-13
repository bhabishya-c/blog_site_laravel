<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
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
Route::get('/',[LoginController::class,'create']);
Route::post('/login',[LoginController::class,'login']);
Route::get('/adduserform',[RegisterController::class,'create']);
Route::post('/adduser',[RegisterController::class,'store']);
Route::get('/blogform',[PostController::class,'create']);
Route::get('/adminhome',[PostController::class,'adminindex']);
Route::get('/userhome',[PostController::class,'userindex']);
Route::delete('/deletepost',[PostController::class,'destroy']);
Route::get('/logout',[LogoutController::class,'logout']);
Route::post('/post',[PostController::class,'store']);






