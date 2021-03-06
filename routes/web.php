<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [TableController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/select-booking-time/{book}', [BookingController::class, 'create'])->middleware(['auth'])->name('bookingTime');
Route::post('/booking', [BookingController::class, 'store'])->middleware(['auth'])->name('booking');

require __DIR__.'/auth.php';
