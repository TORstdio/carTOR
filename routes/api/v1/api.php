<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\v1\user\UserController;
use App\Http\Controllers\api\v1\role\RoleController;
use App\Http\Controllers\api\v1\vehicle\VehicleController;
use App\Http\Controllers\api\v1\vehicle\BranchController;
use App\Http\Controllers\api\v1\vehicle\catalogs\VehicleBrandController;
use App\Http\Controllers\api\v1\vehicle\catalogs\VehicleTypeController;
use App\Http\Controllers\api\v1\vehicle\catalogs\ColorController;

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

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function() {
    Route::apiResource('users', UserController::class);
    Route::post('upload-profile-picture', [UserController::class, 'uploadProfilePicture']);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('vehicles', VehicleController::class);
    Route::apiResource('vehicle_brands', VehicleBrandController::class);
    Route::apiResource('branches', BranchController::class);
    Route::apiResource('vehicle-types', VehicleTypeController::class);
    Route::apiResource('colors', ColorController::class);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('current-user', [AuthController::class, 'show']);
    Route::patch('password', [UserController::class, 'password']);
});

Route::get('/vehicles-catalog', [VehicleController::class, 'index']);//publica
