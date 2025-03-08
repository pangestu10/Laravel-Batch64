<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin;

Route::get('/', [DashboardController::class, 'home']);
Route::get('/register', [FormController::class, 'register']);
Route::get('/welcome', [FormController::class, 'welcome']);

Route::get('/welcome', [FormController::class, 'SignUp']);

Route::get('/master',function(){
    return view('layout.master');
});

Route::middleware(['auth', IsAdmin::class])->group(function () {
   // Genres
// C=>Create Data
Route::get('/genres/create',[GenresController::class,'create']);
Route::post('/genres',[GenresController::class, 'store']);

// update data
Route::get('/genres/{id}/edit',[GenresController::class,'edit']);
// Di routes/web.php
Route::post('/genres/{id}', [GenresController::class, 'update']);



});




// read data
Route::get('/genres',[GenresController::class,'index']);
Route::get('/genres/{id}',[GenresController::class,'show']);



// Delete
Route::delete('/genres/{id}',[GenresController::class,'destroy']);


// books
Route::resource('books',BooksController::class);


// Auth
Route::get('/register',[AuthController::class,'showregister']);
Route::post('/register',[AuthController::class,'registeruser']);



// Login
Route::get('/login',[AuthController::class, 'showlogin'])->name('login');
Route::post('/login',[AuthController::class, 'login']);

Route::post('/logout',[AuthController::class, 'logout'])->middleware('auth');

Route::get('/profile', [AuthController::class, 'getprofile'])->middleware('auth');
Route::post('/profile', [AuthController::class, 'create'])->middleware('auth');
Route::put('/profile/{id}', [AuthController::class, 'updateprofile'])->middleware('auth');






