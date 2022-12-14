<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\Login;
use App\Http\Controllers\Registration;


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

Route::get('/login',[Login::class,'create'])->name('login');
Route::post('login',[Login::class,'login']);
Route::get('/logout',[Login::class,'logout']);

Route::get('/registration',[Registration::class,'create']);
Route::post('registration',[Registration::class,'store']);

Route::post('createTask',[TasksController::class,'create']);
Route::get('/',[TasksController::class,'index'])->middleware("auth")->name('home');
Route::get('/{deleteid}',[TasksController::class,'destroy'])->name('destroy');
Route::get('/{id}',[TasksController::class,'show'])->name('showData');
Route::post('/{updateid}',[TasksController::class,'update']);
