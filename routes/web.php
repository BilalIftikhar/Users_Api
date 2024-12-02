<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\AgriculturalEquipmentController;
use App\Http\Controllers\Admin\InformationBankController;
use App\Http\Controllers\Admin\RentalMachineryController;
use App\Http\Controllers\Admin\SalesMarketController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\FAOController;
use App\Http\Controllers\NewsController;











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

Route::middleware(['auth.check'])->group(function () {


    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    // routes/web.php


    Route::get('/admin/city', [CityController::class, 'index'])->name('admin.city.index');
    Route::get('/admin/city/create', [CityController::class, 'create'])->name('admin.city.create');
    Route::post('/admin/city', [CityController::class, 'store'])->name('admin.city.store');
    Route::delete('/cities/{id}', [CityController::class, 'destroy'])->name('cities.destroy');




    Route::prefix('admin')->name('admin.')->group(function () {
        // Route for displaying the crop creation form
        Route::get('/crop/create', [CropController::class, 'create'])->name('crop.create');
        Route::get('/crop', [CropController::class, 'index'])->name('crop.index');
        // Route for handling the crop form submission
        Route::post('/crop/store', [CropController::class, 'store'])->name('crop.store');
        Route::get('/crops', [CropController::class, 'getCrops']);
        // Other routes if needed...
    });
    Route::delete('/crops/{id}', [CropController::class, 'destroy'])->name('crops.destroy');

    // routes/web.php


    Route::prefix('admin')->group(function () {
        Route::get('/agricultural-equipment', [AgriculturalEquipmentController::class, 'index'])->name('admin.agricultural_equipment.index');
        Route::get('/agricultural-equipment/create', [AgriculturalEquipmentController::class, 'create'])->name('admin.agricultural_equipment.create');
        Route::post('/agricultural-equipment/store', [AgriculturalEquipmentController::class, 'store'])->name('admin.agricultural_equipment.store');
    Route::delete('/agricultural-equipment/{id}', [AgriculturalEquipmentController::class, 'destroy'])->name('admin.agricultural_equipment.destroy');

    });

    Route::prefix('admin/information-bank')->name('admin.information_bank.')->group(function () {
        Route::get('/', [InformationBankController::class, 'index'])->name('index');
        Route::get('/create', [InformationBankController::class, 'create'])->name('create');
        Route::post('/store', [InformationBankController::class, 'store'])->name('store');
    Route::delete('/{id}', [InformationBankController::class, 'destroy'])->name('destroy');

    });
    Route::prefix('admin/rental-machinery')->name('admin.rental_machinery.')->group(function () {
        Route::get('/', [RentalMachineryController::class, 'index'])->name('index');
        Route::get('/create', [RentalMachineryController::class, 'create'])->name('create');
        Route::post('/store', [RentalMachineryController::class, 'store'])->name('store');
    Route::delete('/{id}', [RentalMachineryController::class, 'destroy'])->name('destroy');

    });
    Route::prefix('admin')->group(function () {
        Route::get('/sales-market', [SalesMarketController::class, 'index'])->name('admin.sales_market.index');
        Route::get('/sales-market/create', [SalesMarketController::class, 'create'])->name('admin.sales_market.create');
        Route::post('/sales-market/store', [SalesMarketController::class, 'store'])->name('admin.sales_market.store');
        Route::delete('/sales-market/{id}', [SalesMarketController::class, 'destroy'])->name('admin.sales_market.destroy');

    });

    Route::prefix('admin')->group(function () {
        Route::get('/companies', [CompanyController::class, 'index'])->name('admin.company.index');
        Route::get('/companies/create', [CompanyController::class, 'create'])->name('admin.company.create');
        Route::post('/companies/store', [CompanyController::class, 'store'])->name('admin.company.store');
        Route::delete('/companies/{id}', [CompanyController::class, 'destroy'])->name('admin.company.destroy');

    });

    Route::prefix('admin')->group(function () {
        Route::get('/fao', [FAOController::class, 'index'])->name('admin.fao.index');
        Route::get('/fao/create', [FAOController::class, 'create'])->name('admin.fao.create');
        Route::post('/fao/store', [FAOController::class, 'store'])->name('admin.fao.store');
        Route::delete('/fao/{id}', [FAOController::class, 'destroy'])->name('admin.fao.destroy');

    });

    Route::prefix('admin')->group(function () {
        Route::get('/news', [NewsController::class, 'index'])->name('admin.news.index');
        Route::get('/news/create', [NewsController::class, 'create'])->name('admin.news.create');
        Route::post('/news/store', [NewsController::class, 'store'])->name('admin.news.store');
        Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

    });
    Route::get('/admin/register', function () {
        return view('admin.admin_register');
    })->name('admin.register.view');

    Route::get('/admin/login', function () {
        return view('admin.admin_login');
    })->name('admin.login.view');

    Route::post('/admin/register', [AuthController::class, 'register'])->name('admin.register');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
    Route::get('/', function () {
        // return view('welcome');
        return view('admin.admin_login');
    });

    
});
Route::get('/admin/cities', [CityController::class, 'getCity']);
Route::get('/admin/crops', [CropController::class, 'getCrops']);

