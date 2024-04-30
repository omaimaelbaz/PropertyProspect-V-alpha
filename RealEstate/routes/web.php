<?php

use App\Http\Controllers\Admin\acceptProController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;


use App\Http\Controllers\Agent\AgentController;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ReservationController;
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

//=============================Admin========================================//

Route::get('/admin', [UserController::class, 'index']);
Route::get('/banuser/{id}', [UserController::class, 'banUsers']);

//------------------------ User table ------------------------------//
Route::get('/user', [UserController::class, 'ShowUsers']);
Route::get('/deleteUser/{id}', [UserController::class, 'deleteUsers']);

// create user
Route::get('/createUser', [UserController::class, 'Create']);
Route::post('/createUser', [UserController::class, 'store']);
// update user
Route::get('/update/{id}', [UserController::class, 'updateUser']);
Route::post('/update/{id}', [UserController::class, 'modify']);

//------------------------End User table ------------------------------//

//------------------------ Property category table ------------------------------//
Route::get('/category', [CategoryController::class, 'getCategory']);

Route::get('/CreateCategory', [CategoryController::class, 'categoryFormAdd']);
Route::post('/CreateCategory', [CategoryController::class, 'addCategory']);

Route::get('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory']);

Route::get('/updateCategory/{id}', [CategoryController::class, 'updateCategory']);
Route::post('/updateCategory/{id}', [CategoryController::class, 'modifyCategory']);

//------------------------ End Property category table ------------------------------//

//------------------------  Gestion of Property 'accept or refuse Post '  ------------------------------//

Route::get('/property', [acceptProController::class, 'displayProperty']);

//------------------------ End Property category table ------------------------------//

//------------------------End Property category table ------------------------------//

//============================= End Admin========================================//





//============================= Agent========================================//

Route::get('/agent', [AgentController::class, 'index']);
Route::get('/myproperty', [AgentController::class, 'getProperty']);

Route::get('/add', [AgentController::class, 'create']);
Route::post('/addproperty', [AgentController::class, 'store']);









//============================= End Agent========================================//



// Ath routes

// home page

Route::get('/', [HomeController::class, 'index']);
Route::get('/filter', [HomeController::class, 'filter']);

Route::get('/profile', [HomeController::class, 'ShowWishlist']);
Route::get('/favoriteprop/{id}', [HomeController::class, 'addwishlist']);

Route::post('/updateProfile', [HomeController::class, 'updateProfile']);

Route::get('/login', [AuthController::class, 'loginform']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerform']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'LogOut']);

// dipay prop by typ  rent and buy

// admin

Route::get('/users', [UserController::class, 'ShowUsers']);
Route::get('/delete/{id}', [UserController::class, 'DeleteUsers']);

// admin -create
Route::get('/CreateUser', [UserController::class, 'Create']);
Route::post('/store', [UserController::class, 'store']);



// props

Route::get('/props', [PropertiesController::class, 'GetProps']);
Route::get('/details/{id}', [PropertiesController::class, 'getDetails']);
Route::get('/relatedProp', [PropertiesController::class, 'PropByCategory']);
//--------- send request to agent -----//

Route::post('/createrequest', [RequestController::class, 'SendRequest']);

// reservation

Route::get('/reserver', [ReservationController::class, 'index']);

Route::post('/reservation', [ReservationController::class, 'reserverNow']);
