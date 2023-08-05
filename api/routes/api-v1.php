<?php

use App\Enums\ResponseMessage;
use App\Http\Controllers\API\v1\AuthController;
use Illuminate\Support\Facades\Route;
use App\Enums\ResponseType;
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
