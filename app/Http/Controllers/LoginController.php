<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            $user = Auth::user();
            if ($user->user_type == 0) {
                return redirect()->route('tela_admin');
            } else {
                return redirect()->route('dashboard');
            }
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }
};

