<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\MatchmakingController;
use App\Http\Controllers\MatchRequestController;
use App\Http\Controllers\Settings\ClubController;
use App\Http\Controllers\Settings\CourtController;
use App\Http\Controllers\Settings\RoleController;
use App\Http\Controllers\Settings\UserController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('settings')->group(function () {

        Route::resource('clubs', ClubController::class);
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('courts', CourtController::class);

        Route::post('/users/{user}/update-roles', [UserController::class, 'updateRoles']);
    });

    Route::prefix('matchmaking')->group(function () {

        Route::resource('matches', MatchController::class);
        Route::resource('match-requests', MatchRequestController::class);

        Route::get('/matchmaking/search', [MatchmakingController::class, 'search']);

        //      Accept/Decline request
        Route::put('/matchmaking/match-request-accept/{matchRequestId}', [MatchController::class, 'acceptMatch']);
        Route::put('/matchmaking/match-request-decline/{matchRequestId}', [MatchController::class, 'declineMatch']);
    });
// });
