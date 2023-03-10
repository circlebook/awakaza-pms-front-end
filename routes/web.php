<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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
    return view('home.login');
});

//User

Route::get('/dashboard',[UserController::class,'Dashboard']);
Route::get('/userManagement',[UserController::class,'UserManagement']);
Route::post('/addUser',[UserController::class,'AddUser']);
Route::post('/login',[UserController::class,'Login']);
Route::get('/logout',[UserController::class,'Logout']);
Route::get('/changePasswordView{id}',[UserController::class,'ChangePasswordView']);
Route::post('/changePassword',[UserController::class,'ChangePassword']);
Route::get('/editProfileView{id}',[UserController::class,'EditProfileView']);
Route::post('/editProfile',[UserController::class,'EditProfile']);
Route::post('/resetPassword',[UserController::class,'ResetPassword']);
Route::get('/disableUser{userId}',[UserController::class,'DisableUser']);


