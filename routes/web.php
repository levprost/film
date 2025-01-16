<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MediaController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users',UserController::class)->except('create','store');
Route::get('/users/{user}/editrole', [UserController::class, 'editRole'])->name('user.editRole');
Route::resource('media',MediaController::class);
Route::resource('note',NoteController::class);
Route::resource('genre',GenreController::class);
