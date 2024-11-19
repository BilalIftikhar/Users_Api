<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\AgriculturalEquipmentController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('admin.admin_register');
});
Route::get('/admin/register', function () {
    return view('admin.admin_register');
})->name('admin.register.view');

Route::get('/admin/login', function () {
    return view('admin.admin_login');
})->name('admin.login.view');

Route::post('/admin/register', [AuthController::class, 'register'])->name('admin.register');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
// routes/web.php


Route::get('/admin/city', [CityController::class, 'index'])->name('admin.city.index');
Route::get('/admin/city/create', [CityController::class, 'create'])->name('admin.city.create');
Route::post('/admin/city', [CityController::class, 'store'])->name('admin.city.store');
Route::get('/admin/cities', [CityController::class, 'getCity']);



Route::prefix('admin')->name('admin.')->group(function () {
    // Route for displaying the crop creation form
    Route::get('/crop/create', [CropController::class, 'create'])->name('crop.create');
    Route::get('/crop', [CropController::class, 'index'])->name('crop.index');


    // Route for handling the crop form submission
    Route::post('/crop/store', [CropController::class, 'store'])->name('crop.store');
    Route::get('/crops', [CropController::class, 'getCrops']);


    // Other routes if needed...
});
// routes/web.php


Route::prefix('admin')->group(function () {
    Route::get('/agricultural-equipment', [AgriculturalEquipmentController::class, 'index'])->name('admin.agricultural_equipment.index');
    Route::get('/agricultural-equipment/create', [AgriculturalEquipmentController::class, 'create'])->name('admin.agricultural_equipment.create');
    Route::post('/agricultural-equipment/store', [AgriculturalEquipmentController::class, 'store'])->name('admin.agricultural_equipment.store');
});
