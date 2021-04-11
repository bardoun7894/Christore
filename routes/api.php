<?php

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/banners',function (){
  return \App\Models\Banner::orderBy('created_at','desc')->get();
});

Route::prefix('banner')->group(function (){
 Route::put('/{id}',[\App\Http\Controllers\BannerController::class,'updateStatus']);
   Route::delete('/{id}',[\App\Http\Controllers\BannerController::class,'deleteBanner']);

});
