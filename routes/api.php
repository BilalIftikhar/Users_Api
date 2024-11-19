<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserDataController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\AgriculturalEquipmentController;
use App\Http\Controllers\Admin\InformationBankController;






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

Route::post('/login', [AuthController::class, 'login']);
Route::post('createAccount', [UserDataController::class, 'createAccount']);
Route::middleware('auth:sanctum')->get('/user-details/{cnic}', [UserDataController::class, 'getUserDetails']);
Route::middleware('auth:sanctum')->post('/edit-profile/{cnic}', [UserDataController::class, 'editProfile']);
Route::middleware('auth:sanctum')->delete('/delete-account/{cnic}', [UserDataController::class, 'deleteAccount']);

// routes/api.php

Route::get('/agricultural-equipment', [AgriculturalEquipmentController::class, 'getAgricultureEquipment']);
Route::get('/information-bank', [InformationBankController::class, 'fetchAll']);
