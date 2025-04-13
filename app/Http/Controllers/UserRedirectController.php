<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserRedirectController extends Controller
{
    public function redirectUser()
    {
        if (Auth::check()) {
            if (auth()->user()->user_type == 0) {
                return redirect()->route('tela_admin');
            } elseif (auth()->user()->user_type == 1) {
                return redirect()->route('dashboard'); 
            }
        }
        return redirect()->route('login');
    }
}




