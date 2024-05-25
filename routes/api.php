<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CourtController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Resources
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('clubs', ClubController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('courts', CourtController::class);
});


Route::post('/users/{user}/update-roles', [UserController::class, 'updateRoles']);
