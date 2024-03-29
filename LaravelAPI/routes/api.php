<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\QuoteController;
use App\Models\Quote;
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


Route::get('/hello', function () {
    $data = ["message" => "hello world"];
    return response()->json($data, 200);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/quote', QuoteController::class);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/register', [ApiAuthController::class, 'register']);

Route::post('/file-upload',[FileUploadController::class,'uploadFIle']);