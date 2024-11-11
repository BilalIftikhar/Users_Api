<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\CityController;



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
    return view('welcome');
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


Route::get('/admin/city', [CityController::class, 'create'])->name('admin.city.create');
Route::post('/admin/city', [CityController::class, 'store'])->name('admin.city.store');
