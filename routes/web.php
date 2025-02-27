<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

Route::get('/', [DashboardController::class, 'home']);
Route::get('/register', [FormController::class, 'register']);
Route::get('/welcome', [FormController::class, 'welcome']);

Route::get('/welcome', [FormController::class, 'SignUp']);

Route::get('/master',function(){
    return view('layout.master');
});


