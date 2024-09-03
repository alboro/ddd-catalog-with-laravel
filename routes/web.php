<?php

use App\Presentation\CommentController;
use App\Presentation\LikeController;
use App\Presentation\MovieController;
use App\Presentation\MovieVueController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('movies', MovieController::class);
Route::resource('movies-vue', MovieVueController::class);
Route::controller(LikeController::class)->group(function () {
    Route::post('/like/{movie}', 'store');
});
Route::controller(CommentController::class)->group(function () {
    Route::get('/comments/{movie}', 'index');
    Route::post('/comment/{movie}', 'store');
});
