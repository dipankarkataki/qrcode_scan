<?php

use App\Http\Controllers\SendOtpController;
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
    return view('data-collect');
});

Route::post('send-otp', [SendOtpController::class, 'sendOtp'])->name('send-otp');
Route::get('get-send-opt', [SendOtpController::class, 'getSendOtp'])->name('get-send-otp');
Route::post('verify-otp' , [SendOtpController::class, 'verifyOtp'])->name('verify-otp');
