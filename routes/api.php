<?php
use \App\Http\Controllers\Api\V1\Auth;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('v1/auth/register', RegisterController::class);
Route::post('v1/auth/login', Auth\LoginController::class);