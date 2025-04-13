<?php 
// app/Models/User.php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory, Notifiable;
    
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    protected $fillable = [
        'name', 'email', 'password', 'user_type',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User();
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->save();

        return redirect()->route('login')->with('success', 'Usuário cadastrado com sucesso!');

        
    }
}


