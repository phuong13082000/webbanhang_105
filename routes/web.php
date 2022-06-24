<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

//Admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);

//Category
Route::get('/add-category', [CategoryController::class, 'add_category']);
Route::post('/save-category', [CategoryController::class, 'save_category']);
Route::get('/edit-category/{category_product_id}', [CategoryController::class, 'edit_category']);
Route::post('/update-category/{category_product_id}', [CategoryController::class, 'update_category']);
Route::get('/delete-category/{category_product_id}', [CategoryController::class, 'delete_category']);
Route::get('/all-category', [CategoryController::class, 'all_category']);
Route::post('/export-csv', [CategoryController::class, 'export_csv']);
Route::post('/import-csv', [CategoryController::class, 'import_csv']);
Route::get('/unactive-category/{category_product_id}', [CategoryController::class, 'unactive_category']);
Route::get('/active-category/{category_product_id}', [CategoryController::class, 'active_category']);


//Client
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
