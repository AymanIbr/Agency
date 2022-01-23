<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Models\Service;



Route::prefix('admen')->middleware('auth','Check_user')->group(function(){
    Route::get('/',[AdminController::class , 'index'])->name('Admin.home')->middleware('Check_admin');
    Route::resource('categories', CategoryController::class);
    Route::resource('portfolios',PortfolioController::class);
    Route::resource('teams',TeamController::class);
    Route::resource('services',ServiceController::class);
});

Auth::routes();

