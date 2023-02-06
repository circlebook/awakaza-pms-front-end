<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\locatorController;
use App\Http\Controllers\grcController;
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
//Route::get('/userManagement',[UserController::class,'UserManagement']); // Modfified by Geethaka
Route::get('/userManagement',[UserController::class,'UserManagement'])->name('adminPortal');
Route::post('/addUser',[UserController::class,'AddUser']);
Route::post('/login',[UserController::class,'Login']);
Route::get('/logout',[UserController::class,'Logout']);
Route::get('/changePasswordView{id}',[UserController::class,'ChangePasswordView']);
Route::post('/changePassword',[UserController::class,'ChangePassword']);
Route::get('/editProfileView{id}',[UserController::class,'EditProfileView']);
Route::post('/editProfile',[UserController::class,'EditProfile']);
Route::post('/resetPassword',[UserController::class,'ResetPassword']);
Route::get('/disableUser{userId}',[UserController::class,'DisableUser']);

//Modifications: Geethaka
Route::get('/mainDash', function () {
    return view('mainDash');
});

Route::get('/Maintenance', function () {
    return view('inDev');
});

Route::get('/Admin_dashboard', function () {
    return view('AdminPortal.Admin_dashboard');
});

Route::get('/FrontOps_dashboard', function () {
    return view('FrontOps.FrontOps_Dashboard');
});

Route::get('/HouseKeeping_dashboard', function () {
    return view('HouseKeeping.HouseKeeping_dashboard');
});

Route::get('/Billing_dashboard', function () {
    return view('Billing.Billing_dashboard');
});

Route::get('/BackOps_dashboard', function () {
    return view('BackOps.BackOps_dashboard');
});

Route::get('/BackOps_PayerInfo', function () {
    return view('BackOps.BackOps_PayerInfo');
});

Route::get('/locatorManagement',[locatorController::class,'LocatorManagementDisplay']);
Route::post('/insertLocator',[locatorController::class,'InsertLocator']);
Route::post('/editLocator',[locatorController::class,'EditLocator']);

//Modification: Geethaka End

//Modification:Tehan Start

Route::get('/grcForm', function () {
    return view('FrontOps.FrontOps_Grc');
});

Route::post('/createGrc',[grcController::class,'createGrc']);

