<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RemplacementController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/old', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [PanelController::class, 'index'])->name('admin');
Route::get('/admin', [AdminController::class, 'indi'])->name('admin');
Route::get('/admi', [PanelController::class, 'config'])->name('admi');
Route::get('/admin/personal', [AdminController::class, 'index'])->name('personal');
Route::get('/admin/brand', [BrandController::class, 'index'])->name('brand');
Route::get('/admin/car', [CarController::class, 'index'])->name('car');
Route::get('/admin/service', [ServiceController::class, 'index'])->name('service');
Route::get('/admin/category', [CategoryController::class, 'index'])->name('category');
Route::get('/admin/record', [RecordController::class, 'index'])->name('record');
Route::get('/admin/remplacement', [RemplacementController::class, 'index'])->name('remplacement');


Route::put('/admin/{id}', [AdminController::class, 'update'])->name('editar-usuario');
Route::post('/admin/nuevo-administrador', [AdminController::class, 'store'])->name('añadir-administrador');
Route::post('/admin/nuevo-empleado', [AdminController::class, 'storeEmployee'])->name('añadir-empleado');
Route::delete('/admin/eliminar/{id}', [AdminController::class, 'destroy'])->name('eliminar');


Route::get('/admin/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('edit');
Route::put('/admin/employee/{id}', [EmployeeController::class, 'update'])->name('update');

Route::get('/admin/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand-edit');
Route::put('/admin/brand/update/{id}', [BrandController::class, 'update'])->name('brand-update');
Route::post('/admin/brand/store', [BrandController::class, 'store'])->name('brand-store'); 
Route::delete('admin/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand-delete');


Auth::routes();

// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/register', [AuthController::class, 'register'])->name('register');
