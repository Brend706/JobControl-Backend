<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserController::class, 'register']); //FUNCIONA
Route::post('login', [UserController::class, 'login']); //FUNCIONA
Route::get('/users/{email}', [UserController::class, 'search']);//Funciona...
Route::get('/userid/{id}', [UserController::class, 'show']);

Route::post('/shift', [ShiftController::class, 'store']); //funciona
Route::get('/shifts/{id}', [ShiftController::class, 'show']); //funciona...
Route::get('/user-shifts/{id}', [ShiftController::class, 'index']);//funciona...
Route::put('/shift/{id}', [ShiftController::class, 'update']);
Route::delete('/shift/{id}', [ShiftController::class, 'destroy']);

Route::get('/user-shift-events/{id}', [EventController::class, 'index']);//funciona...
Route::get('/events/{id}', [EventController::class, 'show']); //funciona
Route::post('/event', [EventController::class, 'store']); //funciona
Route::put('/event/{id}', [EventController::class, 'update']); 
Route::delete('/event/{id}', [EventController::class, 'destroy']);