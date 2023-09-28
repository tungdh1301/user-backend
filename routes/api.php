<?php

use App\Http\Controllers\API\CheckInController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\UserController;
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
Route::prefix('user')->group(function () {
    Route::get('', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('', [UserController::class, 'createUser']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/companies', [CompanyController::class, 'index']);
Route::prefix('department')->group(function () {
    Route::get('', [DepartmentController::class, 'index']);
    Route::get('/{id}', [DepartmentController::class, 'show']);
    Route::put('/{id}', [DepartmentController::class, 'update']);
    Route::put('/sub_department/{id}', [DepartmentController::class, 'updateSubDepartment']);
    Route::get('/sub_department/{id}', [DepartmentController::class, 'showSubDepartment']);
});

Route::prefix('checkin')->group(function () {
    Route::get('', [CheckInController::class, 'index']);
    Route::post('', [CheckInController::class, 'store']);
});
