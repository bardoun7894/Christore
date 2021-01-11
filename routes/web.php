<?php

use App\Http\Controllers\Admin\AdminController;
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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/admin')->namespace('Admin')->group(function ($locale){
   // all the admin routes will be defined here
    Route::match(['post','get'],'/',[App\Http\Controllers\Admin\AdminController::class,'login']);
    Route::group(['middleware'=>['admin']],function (){
        Route::get('dashboard',[AdminController::class,'dashboard']);
        Route::get('settings', [AdminController::class,'settings']);
        Route::get('logout',   [AdminController::class,'logout']);
        Route::post('check_current_password',[AdminController::class,'check_current_password']);
        Route::post('update_current_password',[AdminController::class,'update_current_password']);
        Route::match(['get','post'],'update_admin_details',[AdminController::class,'update_admin_details']);

    });

});
