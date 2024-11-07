<?php

use App\Http\Controllers\OTPController;
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

Auth::routes();

Route::get('/verify', [OTPController::class, 'index'])->name('verify');
Route::post('/verify', [OTPController::class, 'verifyOTP'])->name('verify.otp');

Route::post('/verify-resend', [OTPController::class, 'resendOTP'])->name('verify-resend.otp');


Route::middleware(['auth', 'verified', 'otp'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    
});

