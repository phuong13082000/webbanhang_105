<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
