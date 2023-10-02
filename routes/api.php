<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\CustomersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::get('customer',[CustomersController::class,'index']);
Route::get('customer/{id}',[CustomersController::class,'show']);

Route::group(['middleware' => ['jwt.verify']], function() {
    //Todo lo que este dentro de este grupo requiere verificación de usuario.
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('get-user', [AuthController::class, 'getUser']);
    Route::post('customer', [CustomersController::class, 'store']);
    Route::put('customer/{id}', [CustomersController::class,'update']);
    Route::delete('customer/{id}', [CustomersController::class,'destroy']);
});
