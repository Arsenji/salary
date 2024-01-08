<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistController extends Controller
{
    public function showRegistForm()
    {
        return view('auth/register');
    }
    public function regist(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'email' => 'required|email|unique:employee',
            'password' => 'required|min:3|max:55'
        ]);

        // Создание нового пользователя и сохранение в базу данных
        $employee = new Employee([
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);
        $employee->save();
        if (Auth::guard('employee')->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            return redirect()->route('index-form')->with('success', 'Пользователь успешно добавлен.');
        } else {
            return back()->withErrors(['login' => 'Ошибка входа']);
        }
    }
}
