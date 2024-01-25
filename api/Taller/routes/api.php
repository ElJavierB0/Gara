<?php

use App\Http\Controllers\Api\AdminsController;
use App\Http\Controllers\Api\BrandsController;
use App\Http\Controllers\Api\CarsController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\EmployeesController;
use App\Http\Controllers\Api\RecordsController;
use App\Http\Controllers\Api\RemplacementsController;
use App\Http\Controllers\Api\ServicesController;
use App\Http\Controllers\Api\UsersController;
use App\Models\Brands;
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

Route::get('/Categories', [CategoriesController::class, 'list']);
Route::get('/Categories/{id}', [CategoriesController::class, 'item']);
Route::post('/Categories/create', [CategoriesController::class, 'create']);
Route::post('/Categories/{id}/update', [CategoriesController::class, 'update']);

Route::get('/Services', [ServicesController::class, 'list']);
Route::get('/Services/{id}', [ServicesController::class, 'item']);
Route::post('/Services/create', [ServicesController::class, 'create']);

Route::get('/Remplacements', [RemplacementsController::class, 'list']);
Route::get('/Remplacements/{id}', [RemplacementsController::class, 'item']);
Route::post('/Remplacements/create', [RemplacementsController::class, 'create']);

Route::get('/Brands', [BrandsController::class, 'list']);
Route::get('/Brands/{id}', [BrandsController::class, 'item']);
Route::post('/Brands/create', [BrandsController::class, 'create']);

Route::get('/Cars', [CarsController::class, 'list']);
Route::get('/Cars/{id}', [CarsController::class, 'item']);
Route::post('/Cars/create', [CarsController::class, 'create']);

Route::get('/Records', [RecordsController::class, 'list']);
Route::get('/Records/{id}', [RecordsController::class, 'item']);
// Route::post('/Records/create', [RecordsController::class, 'create']);

Route::get('/Employees', [EmployeesController::class, 'list']);
Route::get('/Employees/{id}', [EmployeesController::class, 'item']);
Route::post('/Employees/create', [EmployeesController::class, 'create']);

Route::get('/Admins', [AdminsController::class, 'list']);
Route::get('/Admins/{id}', [AdminsController::class, 'item']);
Route::post('/Admins/create', [AdminsController::class, 'create']);

Route::get('/Users', [UsersController::class, 'list']);
Route::get('/Users/{id}', [UsersController::class, 'item']);
// Route::post('/Users/create', [UsersController::class, 'create']);