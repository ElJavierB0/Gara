<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\RecordController;
use App\Http\Controllers\Api\RemplacementController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/Categories', [CategoryController::class, 'list']);
Route::get('/Categories/{id}', [CategoryController::class, 'item']);
Route::post('/Categories/create', [CategoryController::class, 'create']);
Route::post('/Categories/{id}/update', [CategoryController::class, 'update']);

Route::get('/Services', [ServiceController::class, 'list']);
Route::get('/Services/{id}', [ServiceController::class, 'item']);
Route::post('/Services/create', [ServiceController::class, 'create']);
Route::post('/Services/{id}/update', [ServiceController::class, 'update']);

Route::get('/Remplacements', [RemplacementController::class, 'list']);
Route::get('/Remplacements/{id}', [RemplacementController::class, 'item']);
Route::post('/Remplacements/create', [RemplacementController::class, 'create']);
Route::post('/Remplacements/{id}/update', [RemplacementController::class, 'update']);

Route::get('/Brands', [BrandController::class, 'list']);
Route::get('/Brands/{id}', [BrandController::class, 'item']);
Route::post('/Brands/create', [BrandController::class, 'create']);
Route::post('/Brands/update', [BrandController::class, 'update']);

Route::get('/Cars', [CarController::class, 'list']);
Route::get('/Cars/{id}', [CarController::class, 'item']);
Route::post('/Cars/create', [CarController::class, 'create']);
Route::post('/Cars/{id}/update', [CarController::class, 'update']);

Route::get('/Records', [RecordController::class, 'list']);
Route::get('/Records/{id}', [RecordController::class, 'item']);
Route::post('/Records/create', [RecordController::class, 'create']);
Route::post('/Records/{id}/update', [RecordController::class, 'update']);

Route::get('/Employees', [EmployeeController::class, 'list']);
Route::get('/Employees/{id}', [EmployeeController::class, 'item']);
Route::post('/Employees/create', [EmployeeController::class, 'create']);
Route::post('/Employees/{id}/update', [EmployeeController::class, 'update']);

Route::get('/Admins', [AdminController::class, 'list']);
Route::get('/Admins/{id}', [AdminController::class, 'item']);
Route::post('/Admins/create', [AdminController::class, 'create']);
Route::post('/Admins/{id}/update', [AdminController::class, 'update']);

Route::get('/Users', [UserController::class, 'list']);
Route::get('/Users/{id}', [UserController::class, 'item']);
Route::post('/Users/create', [UserController::class, 'create']);
Route::post('/Users/{id}/update', [UserController::class, 'update']);

Route::post('/Login', [AuthController::class, 'login']);
Route::post('/Register', [AuthController::class, 'register']);