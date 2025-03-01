<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenresController;

Route::get('/', [DashboardController::class, 'home']);
Route::get('/register', [FormController::class, 'register']);
Route::get('/welcome', [FormController::class, 'welcome']);

Route::get('/welcome', [FormController::class, 'SignUp']);

Route::get('/master',function(){
    return view('layout.master');
});


// Genres
// C=>Create Data
Route::get('/genres/create',[GenresController::class,'create']);
Route::post('/genres',[GenresController::class, 'store']);

// read data
Route::get('/genres',[GenresController::class,'index']);
Route::get('/genres/{id}',[GenresController::class,'show']);

// update data
Route::get('/genres/{id}/edit',[GenresController::class,'edit']);
Route::post('/genres/{id}',[GenresController::class,'update']);


// Delete
Route::delete('/genres/{id}',[GenresController::class,'destroy']);


