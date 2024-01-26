<?php

use App\Enums\ResponseMessage;
use Illuminate\Support\Facades\Route;
use App\Enums\ResponseType;
use App\Http\Controllers\API\v1\RoleController;
use App\Http\Controllers\API\v1\PermissionController;
use App\Http\Controllers\API\v1\AuthController;
use App\Http\Controllers\API\v1\UserController;
use App\Http\Controllers\API\v1\UserRoleController;
use App\Http\Controllers\API\v1\RolePermissionController;
use App\Http\Controllers\API\v1\CompanyController;
use App\Http\Controllers\API\v1\RideTypeController;
use App\Http\Controllers\API\v1\ScheduleController;
use Illuminate\Http\Response;

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
Route::post('verify', [AuthController::class, 'verify']);

Route::middleware('auth:api')->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('ride-types', RideTypeController::class);
    Route::resource('user-roles', UserRoleController::class);
    Route::resource('role-permissions', RolePermissionController::class);
});


// Get current active user
Route::get(
    'auth',
    fn () => response()->json(
        [
            'message' => ResponseMessage::FOUND,
            'type' => ResponseType::GET,
            'data' => auth()->user(),
        ],
        Response::HTTP_OK
    )
)->middleware('auth:api');

Route::get(
    '/healthcheck',
    fn () =>
    response()->json(
        [
            "message" => ResponseMessage::SUCCESS,
            "type" => ResponseType::GET,
            "data" => [],
        ],
        200
    )
);
