<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\MenuItmeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Auth\AuthController;
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


Route::prefix('admin/')->name('admin.')->middleware('auth')->group(function (){

    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');
    Route::resource('category',CategoryController::class);
    Route::resource('news', NewsController::class);
    Route::resource('announcement', AnnouncementController::class);
    Route::post('/news/search',[NewsController::class,'search'])->name('news.search');
    Route::put('/profile/change_password',[ProfileController::class,'changepassword'])->name('profile.change_password');
    Route::get('/profile',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile/{id}',[ProfileController::class,'update'])->name('profile.update');
    Route::resource('article', ArticleController::class);
    Route::resource('slider', SliderController::class);
    Route::get('/menugroup',[MenuItmeController::class,'menugroup'])->name('menuitem.group');
    Route::resource('menuitem', MenuItmeController::class);
    Route::post('menuitem/reordering', [MenuItmeController::class,'reorder'])->name('menuitem.reorder');
    Route::resource('link', LinkController::class);
    Route::get('/setting', [SettingController::class,'index'])->name('setting.index');
    Route::get('/setting/general', [SettingController::class,'general'])->name('setting.general');
    Route::get('/setting/social', [SettingController::class,'social'])->name('setting.social');
    Route::patch('/setting', [SettingController::class,'update'])->name('setting.update');
    Route::post('/delete/img', [SettingController::class,'destroy'])->name('setting.destroy');

});






Route::prefix('/')->name('auth.')->group(function (){

    Route::get('/login',[AuthController::class,'showLoginForm'])->name('login');
    Route::post('/login',[AuthController::class,'login'])->name('login');

});

Route::prefix('/')->name('auth.')->group(function (){

    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

});
