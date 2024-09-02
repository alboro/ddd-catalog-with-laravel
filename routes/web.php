<?php

use App\Presentation\MovieController;
use App\Presentation\MovieVueController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('movies', MovieController::class);
Route::resource('movies-vue', MovieVueController::class);
