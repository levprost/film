<?php

use App\Models\Episode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\EpisodeController;

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
Route::resource('episode',EpisodeController::class);
