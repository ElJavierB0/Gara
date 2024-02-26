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
use Illuminate\Support\Facades\Route;

Route::get('/old', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [PanelController::class, 'index'])->name('admin');
Route::get('/admin.admi', [AdminController::class, 'index'])->name('admi');
Route::get('/admin.employee', [EmployeeController::class, 'index'])->name('employee');
Route::get('/admin.brand', [BrandController::class, 'index'])->name('brand');
Route::get('/admin.car', [CarController::class, 'index'])->name('car');
Route::get('/admin.service', [ServiceController::class, 'index'])->name('service');
Route::get('/admin.category', [CategoryController::class, 'index'])->name('category');
Route::get('/admin.record', [RecordController::class, 'index'])->name('record');
Route::get('/admin.remplacement', [RemplacementController::class, 'index'])->name('remplacement');


Auth::routes();

