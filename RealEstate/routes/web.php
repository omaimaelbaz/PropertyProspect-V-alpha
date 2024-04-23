<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\HomeController;


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

// Route::get('/', function () {
//     return view('User.index');
// });
Route::get('/admin', function () {
    return view('admin.dashboard');
});
// Ath routes

// home page
Route::get('/',[HomeController::class,'index']);




Route::get('/login',[AuthController::class,'loginform']);

Route::post('/login',[AuthController::class,'login']);

Route::get('/register', [AuthController::class, 'registerform']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'LogOut']);



// admin

Route::get('/users', [UserController::class, 'ShowUsers']);
Route::get('/delete/{id}', [UserController::class, 'DeleteUsers']);

// admin -create
Route::get('/CreateUser', [UserController::class, 'Create']);
Route::post('/store', [UserController::class, 'store']);


//  agent
Route::get('/agent', [AgentController::class, 'index']);


// props

Route::get('/props', [PropertiesController::class, 'GetProps']);
Route::get('/details/{id}', [PropertiesController::class, 'getDetails']);


