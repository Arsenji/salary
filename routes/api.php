<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegistController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Роуты для аутентификации и регистрации
Route::post('/auth', [AuthController::class, 'auth']);
Route::post('/register', [RegistController::class, 'regist']);

Route::middleware('auth:api')->group(function () {
    // Защищенные маршруты для аутентифицированных сотрудников

    // Создание транзакции
    Route::post('/transactions', [TransactionController::class, 'createTransaction']);

    // Получение суммы зарплаты
    Route::get('/salary', [TransactionController::class, 'showSalary']);

    // Выплата всей накопившейся зарплаты
    Route::post('/pay-salary', [TransactionController::class, 'transactionForCurrentUser']);

    // Выход из системы
    Route::post('/logout', [AuthController::class, 'logout']);
});
