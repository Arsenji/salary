<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function createTransaction(Request $request)
    {
        // Проверяем, аутентифицирован ли пользователь
        if (Auth::guard('employee')->check()) {
            // Получаем аутентифицированного пользователя
            $employee = Auth::guard('employee')->user();

            // Проверяем данные запроса
            $validatedData = $request->validate([
                'numberOfHours' => 'required|integer|max:24|min:0',
            ]);

            // Создаем новую транзакцию
            $transaction = new Transaction([
                'employee_id' => $employee->id,
                'hours' => $validatedData['numberOfHours'],
            ]);

            // Сохраняем транзакцию
            $transaction->save();

            return redirect()->route('index-form');
        }

        // Обработка случая, когда пользователь не аутентифицирован
        return redirect()->route('auth-form')->with('error', 'Вы должны войти в систему для выполнения этого действия.');
    }

   /* public function accountOfHours(Request $request)
    {
        // Проверяем, аутентифицирован ли пользователь
        if (Auth::guard('employee')->check()) {
            // Получаем аутентифицированного пользователя
            $employee = Auth::guard('employee')->user();

            // Проверяем данные запроса
            $validatedData = $request->validate([
                'numberOfHours' => 'required|integer|max:24|min:0',
            ]);

            // Создаем новую транзакцию
            $transaction = new Transaction([
                'employee_id' => $employee->id,
                'hours' => $validatedData['numberOfHours'],
            ]);

            // Сохраняем транзакцию
            $transaction->save();

            return redirect()->route('index-form');
        }

        // Обработка случая, когда пользователь не аутентифицирован
        return redirect()->route('auth-form')->with('error', 'Вы должны войти в систему для выполнения этого действия.');
    }*/


    public function showSalary()
    {
        $employee = Auth::guard('employee')->user();
        $totalHours = Transaction::where('employee_id', $employee->id)->sum('hours');
        $totalHours *= 100;

        return response()->json(['total_hours' => $totalHours]);
    }

    public function transactionForCurrentUser()
    {
        $employee = Auth::guard('employee')->user();
        Transaction::where('employee_id', $employee->id)->delete();
        return redirect()->route('index-form')->with('success', 'Вы успешно вывели всю сумму');
    }
}
