<?php
use \App\Http\Controllers\Api\V1\Auth;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\ParkingController;
use App\Http\Controllers\Api\V1\VehicleController;
use App\Http\Controllers\Api\v1\ZoneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('v1/auth/register', RegisterController::class);
Route::post('v1/auth/login', Auth\LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('v1/profile', [Auth\ProfileController::class, 'show']);
    Route::put('v1/profile', [Auth\ProfileController::class, 'update']);
    Route::put('v1/password', Auth\PasswordUpdateController::class);
    Route::delete('v1/logout', Auth\LogoutController::class);

    Route::apiResource('v1/vehicles', VehicleController::class);
    Route::get('v1/zones', [ZoneController::class, 'index']);

    Route::post('v1/parkings/start', [ParkingController::class, 'start']);
    Route::put('v1/parkings/{parking}', [ParkingController::class, 'stop']);
    Route::get('v1/parkings/{parking}', [ParkingController::class, 'show']);
});