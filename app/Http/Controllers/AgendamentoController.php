<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAgendamentos;
use App\Models\Agendamento;
use App\Models\Servico;

class AgendamentoController extends Controller
{
    public function dashboard()
    {
        $servicos = Servico::all();
        return view('dashboard', compact('servicos'));
    }
    public Agendamento $agendamento;

    public function __construct()
    {
        $this->agendamento = new Agendamento();
    }


    public function index()
    {
        $servicos = Servico::all(); 
        $agendamentos = Agendamento::with('service')->get();

        return view('agendamentos_admin', compact('servicos', 'agendamentos'));
    }

    public function create()
    {
        $servicos = Servico::all();
        return view('agendamentos.create', compact('servicos'));
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
            'meu_pet'     => $validatedData['meu_pet'],
            'id_services' => $validatedData['servico'],
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
        return view('agendamentos_edit', compact('agendamento', 'servicos'));
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
            'meu_pet'     => $validatedData['meu_pet'],
            'id_services' => $validatedData['servico'],
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
