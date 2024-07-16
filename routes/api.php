<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserAuthController;


Route::get('get-appsetting', [UserAuthController::class, 'getAppSetting'])->name('get-appsetting');
Route::get('get-wallpaper', [UserAuthController::class, 'getWallpaper'])->name('get-wallpaper');
