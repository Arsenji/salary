<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegistController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showAuthForm'])->name('auth-form');
Route::post('/', [AuthController::class, 'auth']);


Route::get('/register', [RegistController::class, 'showRegistForm'])->name('register-form');
Route::post('/register', [RegistController::class, 'regist']);

Route::get('/transaction', [TransactionController::class, 'index'])->name('index-form');
/*Route::post('/transaction', [TransactionController::class, 'accountOfHours'])->name('transaction');*/

Route::get('/transaction/total-hours', [TransactionController::class, 'showSalary'])->name('total-hours');

Route::post('/pay-salary', [TransactionController::class, 'transactionForCurrentUser'])->name('pay-salary');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
