<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('healthcheck',function(){
    return response()->json([
        'status' => 'success',
        'message'=>'API is Running',
        'data'=>[],
        'error'=>[]
    ]);
});

Route::prefix('auth')->group(function(){
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
});
//when no route found | fallback function

Route::fallback(function(){
    return response()->json([
        'status' => 'error',
        'message'=>'API Endpoint not found',
        'data'=>[],
        'error'=>[]
    ]);
});