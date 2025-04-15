<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAgendamentos;
use App\Models\Agendamento;
use App\Models\Servico;
use App\Models\Animal;
use App\Models\Feedback;

class AgendamentoController extends Controller
{
    
public function pet()
{
    return $this->belongsTo(Animal::class, 'pet_id'); 
}

    public function dashboard()
    {
        $servicos = Servico::all();
        $feedbacks = Feedback::all();
        $pets = Animal::where('user_id', auth()->id())->get();
        return view('dashboard', compact('servicos', 'feedbacks','pets'));
    }
    public Agendamento $agendamento;

    public function __construct()
    {
        $this->agendamento = new Agendamento();
    }


    public function index()
    {
        $servicos = Servico::all(); 
        $agendamentos = Agendamento::with(['pet', 'service'])->get();
        $pets = Animal::where('user_id', auth()->id())->get();  
        
        return view('agendamentos_admin', compact('servicos', 'agendamentos', 'pets'));
    }

    public function create()
    {
        $servicos = Servico::all();
        $pets = Animal::where('user_id', auth()->id())->get(); 
        return view('agendamentos.create', compact('servicos', 'pets'));
    }

    public function store(StoreUpdateAgendamentos $request)
    {
        $validatedData = $request->validated();

        Agendamento::create([
            'nome'        => $validatedData['nome'],
            'email'       => $validatedData['email'],
            'telefone'    => $validatedData['telefone'],
            'data'        => $validatedData['data'],
            'hora'        => $validatedData['hora'],
            'especie'     => $validatedData['especie'],
            'id_services' => $validatedData['servico'],
            'pet_id'      => $validatedData['pet_id'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Agendamento enviado com sucesso!');
    }

    public function show()
    {
        $agendamentos = Agendamento::with('service')->get();
        return view('agendamentos_admin', compact('agendamentos'));
    }

    public function edit(Agendamento $agendamento)
    {
        $servicos = Servico::all();
        return view('agendamentos_edit', compact('agendamento', 'servicos','pets'));
    }

    public function update(StoreUpdateAgendamentos $request, $id)
    {
        $validatedData = $request->validated();

        $agendamento = Agendamento::findOrFail($id);

        $agendamento->update([
            'nome'        => $validatedData['nome'],
            'email'       => $validatedData['email'],
            'telefone'    => $validatedData['telefone'],
            'data'        => $validatedData['data'],
            'hora'        => $validatedData['hora'],
            'especie'     => $validatedData['especie'],
            'id_services' => $validatedData['servico'],
            'pet_id' => $validatedData['pet_id'],
        ]);

        return redirect()->route('agendamentos.admin')->with('success', 'Agendamento atualizado com sucesso!');
    }
    public function destroy($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento excluído com sucesso!');
    }


}
