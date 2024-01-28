<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\MenuController;
use App\Http\Controllers\Dashboard\ItemController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\OrderController; 
use App\Http\Controllers\Dashboard\EmployeeController; 
use App\Http\Controllers\Dashboard\BookingController; 
use App\Http\Controllers\Dashboard\ReviewController; 


    Route::middleware(['auth'])->group(function () {
        Route::get('/', function () {
            return view('dashboard.index');
        });
        Route::get('/dashboard/admin', function () {
            return view('dashboard.index');
        })->name('dashboard.index');
        //Start Route Of Users
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/user/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/user/update/{id}',[UserController::class,'update'])->name('users.update');
        Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/users/profile/{id}', [UserController::class, 'getProfile'])->name('profile.index'); 
        Route::put('/profile/update', [UserController::class, 'profileUpdate'])->name('profile.update');
        //End Route Of Users

        //Start Route Of Menu
        Route::resource('menus', MenuController::class);
        //End Route Of Menu

        //Start Route Of Item
        Route::resource('items', ItemController::class);
        //End Route Of Item

        //Start Route Of Customer
        Route::resource('customers', CustomerController::class);
        //End Route Of Customer

        //Start Route Of Order
        Route::resource('orders', OrderController::class);
        Route::put('/update-status/{id}', 'OrderController@update')->name('update.status');
        //End Route Of Order

        //Start Route Of Employee
        Route::resource('employees', EmployeeController::class);
        //End Route Of Employee
        
        //Start Route Of Booking
        Route::resource('booking', BookingController::class);
        Route::post('/bookings/{id}/confirm', [BookingController::class, 'confirmBooking']);
        Route::post('/bookings/{id}/reject', [BookingController::class, 'rejectBooking']);
        Route::post('/bookings/{id}/delete', [BookingController::class, 'deleteBooking']);
        //End Route Of Booking

        //Start Route Of Review
        Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
        Route::delete('/destroy-reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
        Route::post('/update-review-status/{id}', [ReviewController::class, 'updateReviewStatus'])->name('update.review.status');

        //End Route Of Review

    });
        Route::post('sotre-reviews', [ReviewController::class, 'store'])->name('reviews.store');
        Route::post('sotre-booking', [BookingController::class, 'store'])->name('booking.store');





        