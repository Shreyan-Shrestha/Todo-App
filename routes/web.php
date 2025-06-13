<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;

Route::middleware("auth")->get('/', [TodoController::class, 'index']);
// Route::get('/', [TodoController::class, 'index'] );
Route::get('/add', [TodoController::class,'add'] );
Route::post('/add', [TodoController::class,'store'] );

Route::get('/update/{id}', [TodoController::class,'updateview'] );
Route::put('/update/{id}', [TodoController::class,'update'] );

Route::delete('/delete/{id}', [TodoController::class,'destroy'] );

Route::get('/register', [AuthController::class,'registerview'] );
Route::post('/register', [AuthController::class,'register'] );

Route::get('/login', [AuthController::class,'loginview'] )->name('login');
Route::post('/login', [AuthController::class,'login'] );
Route::post('/logout', [AuthController::class,'logout'] );

