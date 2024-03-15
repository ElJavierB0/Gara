<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RemplacementController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/old', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [PanelController::class, 'index'])->name('admin');
Route::get('/admi', [PanelController::class, 'config'])->name('admi');
Route::get('/admin/personal', [AdminController::class, 'index'])->name('personal');
Route::get('/admin/employee', [EmployeeController::class, 'index'])->name('employee');
Route::get('/admin/brand', [BrandController::class, 'index'])->name('brand');
Route::get('/admin/car', [CarController::class, 'index'])->name('car');
Route::get('/admin/service', [ServiceController::class, 'index'])->name('service');
Route::get('/admin/category', [CategoryController::class, 'index'])->name('category');
Route::get('/admin/record', [RecordController::class, 'index'])->name('record');
Route::get('/admin/remplacement', [RemplacementController::class, 'index'])->name('remplacement');


Route::get('/admin/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand/edit');
Route::put('/admin/brand/update/{id}', [BrandController::class, 'update'])->name('brand/update');;


Auth::routes();

// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/register', [AuthController::class, 'register'])->name('register');
