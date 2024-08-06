<?php

use App\Http\Middleware\CheckIfAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/my_rentals', [App\Http\Controllers\HomeController::class, 'my_rentals'])->name('my_rentals');

    Route::group(['middleware' => CheckIfAdmin::class], function () {
        Route::get('/cars', [App\Http\Controllers\CarController::class, 'index'])->name('cars.index');
        Route::get('/cars/create', [App\Http\Controllers\CarController::class, 'create'])->name('cars.create');
        Route::post('/cars/create', [App\Http\Controllers\CarController::class, 'store'])->name('cars.store');
        Route::get('/cars/{id}', [App\Http\Controllers\CarController::class, 'show'])->name('cars.show');
        Route::get('/cars/{id}/edit', [App\Http\Controllers\CarController::class, 'edit'])->name('cars.edit');
        Route::post('/cars/{id}/update', [App\Http\Controllers\CarController::class, 'update'])->name('cars.update');
        Route::post('/cars/{id}/delete', [App\Http\Controllers\CarController::class, 'delete'])->name('cars.delete');
    });

    Route::get('/rentals', [App\Http\Controllers\RentalController::class, 'index'])->name('rentals.index');
    Route::get('/rentals/create', [App\Http\Controllers\RentalController::class, 'create'])->name('rentals.create');
    Route::post('/rentals/create', [App\Http\Controllers\RentalController::class, 'store'])->name('rentals.store');

    Route::get('/rentals/{id}', [App\Http\Controllers\RentalController::class, 'show'])->name('rentals.show');
    Route::post('/rentals/{id}/pay', [App\Http\Controllers\RentalController::class, 'pay'])->name('rentals.pay');
    Route::post('/rentals/{id}/cancel', [App\Http\Controllers\RentalController::class, 'cancel'])->name('rentals.cancel');
    Route::post('/rentals/{id}/return', [App\Http\Controllers\RentalController::class, 'return'])->name('rentals.return');
});
