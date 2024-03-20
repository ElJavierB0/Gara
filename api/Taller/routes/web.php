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
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/old', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
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
    Route::get('/admin/user', [UserController::class, 'index'])->name('user');


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

    Route::post('/admin/car/store', [CarController::class, 'store'])->name('car-store');
    Route::get('/admin/car/{car}/edit', [CarController::class, 'edit'])->name('car-edit');
    Route::put('/admin/car/{car}', [CarController::class, 'update'])->name('car-update');
    Route::delete('/admin/car/delete/{id}', [CarController::class, 'destroy'])->name('car-delete');

    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
    Route::put('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('category-update');
    Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('category-store');
    Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category-delete');

    Route::get('/admin/service/edit/{id}', [ServiceController::class, 'edit'])->name('service-edit');
    Route::put('/admin/service/update/{id}', [ServiceController::class, 'update'])->name('service-update');
    Route::post('/admin/service/store', [ServiceController::class, 'store'])->name('service-store');
    Route::delete('/admin/service/delete/{id}', [ServiceController::class, 'destroy'])->name('service-delete');

    Route::get('/admin/remplacement/edit/{id}', [RemplacementController::class, 'edit'])->name('remplacement-edit');
    Route::put('/admin/remplacement/update/{id}', [RemplacementController::class, 'update'])->name('remplacement-update');
    Route::post('/admin/remplacement/store', [RemplacementController::class, 'store'])->name('remplacement-store');
    Route::delete('/admin/remplacement/delete/{id}', [RemplacementController::class, 'destroy'])->name('remplacement-delete');

    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('user-edit');
    Route::put('/admin/user/update/{id}', [UserController::class, 'update'])->name('user-update');
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('user-store');
    Route::delete('/admin/user/delete/{id}', [UserController::class, 'destroy'])->name('user-delete');
});

Auth::routes();

// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/register', [AuthController::class, 'register'])->name('register');
