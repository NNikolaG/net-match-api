<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MatchmakingController;
use App\Http\Controllers\Settings\ClubController;
use App\Http\Controllers\Settings\CourtController;
use App\Http\Controllers\Settings\RoleController;
use App\Http\Controllers\Settings\UserController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Resources
Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('settings')->group(function () {

        Route::resource('clubs', ClubController::class);
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('courts', CourtController::class);

        Route::post('/users/{user}/update-roles', [UserController::class, 'updateRoles']);
    });

    Route::get('/matchmaking/search', [MatchmakingController::class, 'search']);
});


