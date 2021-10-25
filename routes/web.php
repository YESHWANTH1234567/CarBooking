<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();
Route::get('/bookingsearch', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home',[App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('search',[App\Http\Controllers\HomeController::class,'search'])->name('search');
Route::get('bookingdata',[App\Http\Controllers\HomeController::class,'bookingData'])->name('bookingdata');
Route::get('/admin/adminRegister',function(){
    return view('adminregister');
});
Route::post('/admin/admincreate',[App\Http\Controllers\RegisterController::class,'adminCreate'])->name('adminCreate');

Route::get('admin/adminpage',function(){
    return view('admin');
})->name('adminpage');

Route::group(['prefix'=>'','namespace'=>'','middleware'=>['is_admin']],function(){
    Route::get('/admin/cardetails',[App\Http\Controllers\CarController::class,'carDetails'])->name('cardetails');
    Route::get('/admin/carcreate',[App\Http\Controllers\CarController::class,'carCreate']);
    Route::get('/admin/carupdate/{id}',[App\Http\Controllers\CarController::class,'carUpdate']);
    Route::get('/admin/cardelete/{id}',[App\Http\Controllers\CarController::class,'carDelete']);
    Route::post('/admin/carstore',[App\Http\Controllers\CarController::class,'carStore'])->name('carstore');
    Route::post('/admin/carupdated',[App\Http\Controllers\CarController::class,'carUpdated'])->name('carupdated');
});

Route::get('admin/back',[App\Http\Controllers\HomeController::class,'backToPage']);


Route::group(['middleware'=>'is_admin'],function(){
    Route::get('/admin/locationdetails',[App\Http\Controllers\LocationController::class,'locationDetails']);
    Route::get('/admin/locationcreate',[App\Http\Controllers\LocationController::class,'locationCreate']);   
    Route::post('/admin/locationstore',[App\Http\Controllers\LocationController::class,'locationStore'])->name('locationstore');
    Route::get('/admin/locationupdate/{id}',[App\Http\Controllers\LocationController::class,'locationUpdate']);
    Route::post('/admin/locationupdated',[App\Http\Controllers\LocationController::class,'locationUpdated'])->name('locationupdated');
    Route::get('/admin/locationdelete/{id}',[App\Http\Controllers\LocationController::class,'locationDelete']);
});

Route::group(['prefix'=>'','namespace'=>'','middleware'=>['is_admin']],function(){
    Route::get('/admin/driverdetails',[App\Http\Controllers\DriverController::class,'driverDetails']);
    Route::get('/admin/drivercreate',[App\Http\Controllers\DriverController::class,'driverCreate']);
    Route::get('/admin/driverupdate/{id}',[App\Http\Controllers\DriverController::class,'driverUpdate']);
    Route::get('/admin/driverdelete/{id}',[App\Http\Controllers\DriverController::class,'driverDelete']);
    Route::post('/admin/driverstore',[App\Http\Controllers\DriverController::class,'driverStore'])->name('driverstore');
    Route::post('/admin/driverupdated',[App\Http\Controllers\DriverController::class,'driverUpdated'])->name('driverupdated');
});


Route::get('bookingdetails/{id}/{price}',[App\Http\Controllers\HomeController::class,'bookingDetails']);
Route::get('confirmBooking/{id}/{id1}/{price}',[App\Http\Controllers\BookingController::class,'confirmBooking']);
// Route::get('bookingdata',[App\Http\Controllers\HomeController::class,'search']);