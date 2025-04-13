<?php 

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSupport;
use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionariosController extends Controller
{
    public readonly Funcionario $funcionario;
    public function __construct(){
       $this->funcionario = new Funcionario(); 
    }
    public function funcionarios()
    {
        $funcionarios = Funcionario::all();  
        return view('funcionarios_admin', compact('funcionarios'));  
    }


    public function create()
    {
        return view('funcionarios_create');
    }

    public function store(StoreUpdateSupport $request)
    {
        $created = $this ->funcionario->create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'idade' => $request->input('idade'),
            'nivel_escolar' => $request->input('nivel_escolar'),
            'telefone' => $request->input('telefone'),
        ]);
        return redirect()->route('funcionarios_admin')->with('success', 'Funcionário criado com sucesso!');
    }

 
    public function show($id)
    {
        $funcionario = Funcionario::findOrFail($id);  
        return view('funcionarios.show', compact('funcionario')); 
    }

    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionarios_edit', compact('funcionario'));
    }

    public function update(StoreUpdateSupport $request, $id)
    {
        $updated = $this-> funcionario->where('id', $id) -> update($request->except(['_token', '_method']));
    
        return redirect()->route('funcionarios_admin')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();
        return redirect()->route('funcionarios_admin')->with('success', 'Funcionário excluído com sucesso!');
    }
}
