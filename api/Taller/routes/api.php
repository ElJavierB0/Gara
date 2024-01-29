<?php

use App\Http\Controllers\Api\AdminsController;
use App\Http\Controllers\Api\BrandsController;
use App\Http\Controllers\Api\CarsController;
use App\Http\Controllers\Api\EmployeesController;
use App\Http\Controllers\Api\RecordsController;
use App\Http\Controllers\Api\RemplacementsController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RemplacementController;
use App\Models\Brands;
use App\Models\Category;
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

Route::get('/Brands', [BrandsController::class, 'list']);
Route::get('/Brands/{id}', [BrandsController::class, 'item']);
Route::post('/Brands/create', [BrandsController::class, 'create']);
Route::post('/Brands/{id}/update', [BrandsController::class, 'update']);

Route::get('/Cars', [CarsController::class, 'list']);
Route::get('/Cars/{id}', [CarsController::class, 'item']);
Route::post('/Cars/create', [CarsController::class, 'create']);
Route::post('/Cars/{id}/update', [CarsController::class, 'update']);

Route::get('/Records', [RecordsController::class, 'list']);
Route::get('/Records/{id}', [RecordsController::class, 'item']);
// Route::post('/Records/create', [RecordsController::class, 'create']);
// Route::post('/Records/{id}/update', [RecordsController::class, 'update']);

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