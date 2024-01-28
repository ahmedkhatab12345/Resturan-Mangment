<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Resturant\ResturantController; 
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Resturant\OrderController; 
use App\Http\Controllers\Resturant\BookingController;
use App\Http\Controllers\Resturant\AboutController; 
use App\Http\Controllers\Resturant\MenuResturantController; 
use App\Http\Controllers\Resturant\OurTeamController; 
use App\Http\Controllers\Resturant\ServicesController; 
use App\Http\Controllers\Resturant\TestimonialController; 


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
    Route::resource('booking_user', BookingController::class);
    Route::get('status-of-bookings', [BookingController::class, 'getBooking'])->middleware(['customers'])->name('customer.statusbooking');
    Route::resource('order_user', OrderController::class);
    Route::resource('about', AboutController::class);
    Route::resource('menuresturant', MenuResturantController::class);
    Route::resource('ourteam', OurTeamController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('testimonial', TestimonialController::class);



    
    require __DIR__.'/auth.php';
