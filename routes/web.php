<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
use App\Http\Controllers\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'checkRole:company,supplier'])->group(function () {
    Route::get('/farmschedule', [App\Http\Controllers\FarmScheduleController::class, 'index'])->name('farmschedule');
    Route::get('/coffeeinventory', [App\Http\Controllers\CoffeeInventoryController::class, 'index'])->name('coffeeinventory');
    Route::get('/growcoffee', [App\Http\Controllers\GrowCoffeeController::class, 'index'])->name('growcoffee');
    Route::get('/locationmapping', [App\Http\Controllers\LocationMappingController::class, 'index'])->name('locationmapping');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::get('/ratings', [App\Http\Controllers\RatingsController::class, 'index'])->name('ratings');
    Route::get('/shopping', [App\Http\Controllers\ShoppingController::class, 'index'])->name('shopping');
    Route::get('/speciesidentifier', [App\Http\Controllers\SpeciesIndentifierController::class, 'index'])->name('speciesidentifier');
    
    Route::get('/verification-popup', [VerificationController::class, 'showVerificationPopup'])->name('verification.popup');
    Route::post('/send-verification-request', [VerificationController::class, 'sendVerificationRequest'])->name('send.verification.request');
    Route::get('/verification-request-success', [VerificationController::class, 'verificationRequestSuccess'])->name('verification-request-success');
});

Route::middleware(['auth', 'checkRole:regular'])->group(function () {
    Route::get('/growcoffee', [App\Http\Controllers\GrowCoffeeController::class, 'index'])->name('growcoffee');
    Route::get('/locationmapping', [App\Http\Controllers\LocationMappingController::class, 'index'])->name('locationmapping');  
});

