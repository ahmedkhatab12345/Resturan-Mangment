<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Resturant\ResturantController; 
use App\Http\Controllers\Dashboard\CustomerController;

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
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    Route::get('Resturant', [ResturantController::class, 'index'])->name('resturant.index');
    Route::get('login-signup', [CustomerController::class, 'getlogin'])->name('login.form');
    Route::post('customer-signup', [CustomerController::class, 'CustomerSignup'])->name('customer.signup');
    Route::post('customer-sigin', [CustomerController::class, 'CustomerSignin'])->name('customer.signin');
    Route::get('customer-logout', [CustomerController::class, 'logout'])->name('customer.logout');

    
    require __DIR__.'/auth.php';
