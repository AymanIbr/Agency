<?php

use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PortfolioController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::get('/',function(){
return view('Front.index');
});


Route::prefix('admen')->middleware('auth','Check_user')->group(function(){
    Route::get('/',[AdminController::class , 'index'])->name('Admin.home')->middleware('Check_admin');
    Route::resource('categories', CategoryController::class);
    Route::resource('portfolios',PortfolioController::class);
    Route::resource('teams',TeamController::class);
    Route::resource('services',ServiceController::class);
});


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
Route::prefix('Agency')->group(function(){

    Route::get('/',[PagesController::class ,'index'])->name('HomePage');
    Route::get('service',[PagesController::class ,'service'])->name('ServicePage');
    Route::get('portfolio',[PagesController::class ,'portfolio'])->name('PortfolioPage');
    Route::get('team',[PagesController::class ,'team'])->name('TeamPage');
    Route::get('contact',[PagesController::class ,'contact'])->name('ContactPage');
    Route::post('ContactSubmit',[PagesController::class ,'ContactSubmit'])->name('ContactSubmit');

});
});


Auth::routes();

