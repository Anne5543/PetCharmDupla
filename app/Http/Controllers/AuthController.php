<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            return redirect()->route('redirect');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
