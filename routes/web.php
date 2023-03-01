<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\locatorController;
use App\Http\Controllers\grcController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\foodController;
use App\Http\Controllers\minibarController;


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
Route::get('/deleteLocator{locatorId}',[locatorController::class,'deleteLocator']);
Route::get('/getNotifications',[notificationController::class,'getNotifications']);
Route::get('/roomManagement',[roomController::class,'roomManagement']);
Route::post('/addRoom',[roomController::class,'addRoom']);
Route::post('/editRoom',[roomController::class,'editRoom']);
//Modification: Geethaka End

//Modification:Tehan Start

Route::get('/grcForm', function () {
    return view('FrontOps.FrontOps_Grc');
});

Route::post('/createGrc',[grcController::class,'createGrc']);

//Modification: Geethaka End

//Modification:Tehan Start

Route::get('/grcForm', function () {
    return view('FrontOps.FrontOps_Grc');
});

Route::post('/createGrc',[grcController::class,'createGrc']);

//Modifications: Sandarekha

 
 
//billing




Route::get('/createbill', function () {
    return view('Billing.createbill');
});
//end billing
//room management


//end room management

Route::get('/room_management', function () {
    return view('FrontOps.room_management');
});

//end room managemeent

//Minibar
Route::get('/Mini_bar',[minibarController::class,'miniBarItemGetAll']);
Route::post('/Mini_bar_itemAdd',[minibarController::class,'insertMinibarItem']);
Route::post('/Mini_bar_itemEdit',[minibarController::class,'editMinibarItem']);




//Modifications: Sandarekha end
