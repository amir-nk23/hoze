<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::name('api')->prefix('front/')->group(function (){

    Route::get('menu/groups',[\App\Http\Controllers\Api\MenuController::class,'group']);
    Route::get('menu/items',[\App\Http\Controllers\Api\MenuController::class,'item']);
    Route::get('news',[\App\Http\Controllers\Api\NewsController::class,'index']);
    Route::get('news/{news}',[\App\Http\Controllers\Api\NewsController::class,'show']);
    Route::get('announcements',[\App\Http\Controllers\Api\AnnouncementController::class,'index']);
    Route::get('announcement/{announcement}',[\App\Http\Controllers\Api\AnnouncementController::class,'']);
    Route::get('articles',[\App\Http\Controllers\Api\ArticleController::class,'index']);
    Route::get('article/{article}',[\App\Http\Controllers\Api\ArticleController::class,'show']);
    Route::get('sliders',[\App\Http\Controllers\Api\SliderController::class,'index']);
    Route::get('links',[\App\Http\Controllers\Api\LinkController::class,'index']);
    Route::get('setting',[\App\Http\Controllers\Api\SettingController::class,'index']);



});
