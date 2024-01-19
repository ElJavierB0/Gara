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

Route::get('/Services', [ServicesController::class, 'list']);
Route::get('/Services/{id}', [ServicesController::class, 'item']);

Route::get('/Remplacements', [RemplacementsController::class, 'list']);
Route::get('/Remplacements/{id}', [RemplacementsController::class, 'item']);

Route::get('/Brands', [BrandsController::class, 'list']);
Route::get('/Brands/{id}', [BrandsController::class, 'item']);

Route::get('/Cars', [CarsController::class, 'list']);
Route::get('/Cars/{id}', [CarsController::class, 'item']);

Route::get('/Records', [RecordsController::class, 'list']);
Route::get('/Records/{id}', [RecordsController::class, 'item']);

Route::get('/Employees', [EmployeesController::class, 'list']);
Route::get('/Employees/{id}', [EmployeesController::class, 'item']);

Route::get('/Admins', [AdminsController::class, 'list']);
Route::get('/Admins/{id}', [AdminsController::class, 'item']);

Route::get('/Users', [UsersController::class, 'list']);
Route::get('/Users/{id}', [UsersController::class, 'item']);