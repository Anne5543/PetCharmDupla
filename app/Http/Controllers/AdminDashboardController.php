<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Animal;
use App\Models\Agendamento;
use App\Models\Feedback;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsuarios = User::count();
        $totalPets = Animal::count();
        $totalAgendamentos = Agendamento::count();
        $totalFeedbacks = Feedback::count();

        return view('admin.dashboard', compact(
            'totalUsuarios',
            'totalPets',
            'totalAgendamentos',
            'totalFeedbacks'
        ));
    }
    
}



   
