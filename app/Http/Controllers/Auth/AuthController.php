<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showAuthForm()
    {
        return view('auth/auth');
    }
    public function auth(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('employee')->attempt($validatedData)) {
            return redirect()->route('index-form');
        } else {
            return back()->withErrors(['email' => 'Неверный email или пароль'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('employee')->logout();
        return redirect('/');
    }
}
