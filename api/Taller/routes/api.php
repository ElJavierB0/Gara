<?php

use App\Http\Controllers\Api\AdminsController;
use App\Http\Controllers\Api\EmployeesController;
use App\Http\Controllers\Api\RecordsController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RemplacementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

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
Route::post('/Brands/{id}/update', [BrandController::class, 'update']);

Route::get('/Cars', [CarController::class, 'list']);
Route::get('/Cars/{id}', [CarController::class, 'item']);
Route::post('/Cars/create', [CarController::class, 'create']);
Route::post('/Cars/{id}/update', [CarController::class, 'update']);

Route::get('/Records', [RecordController::class, 'list']);
Route::get('/Records/{id}', [RecordController::class, 'item']);
// Route::post('/Records/create', [RecordController::class, 'create']);
// Route::post('/Records/{id}/update', [RecordController::class, 'update']);

Route::get('/Employees', [EmployeesController::class, 'list']);
Route::get('/Employees/{id}', [EmployeesController::class, 'item']);
// Route::post('/Employees/create', [EmployeesController::class, 'create']);
// Route::post('/Employees/{id}/update', [EmployeesController::class, 'update']);

Route::get('/Admins', [AdminsController::class, 'list']);
Route::get('/Admins/{id}', [AdminsController::class, 'item']);
// Route::post('/Admins/create', [AdminsController::class, 'create']);
// Route::post('/Admins/{id}/update', [AdminsController::class, 'update']);

Route::get('/Users', [UsersController::class, 'list']);
Route::get('/Users/{id}', [UsersController::class, 'item']);
// Route::post('/Users/create', [UsersController::class, 'create']);
// Route::post('/Users/{id}/update', [UsersController::class, 'update']);