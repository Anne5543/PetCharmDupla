<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animais = Animal::all();
        return view('animal', compact('animais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validação dos dados
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'peso' => 'required|numeric',
        'idade' => 'required|numeric',
        'imagem' => 'nullable|image|max:2048',
    ]);

    // Verifica se tem imagem válida
    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
        $requestImage = $request->file('imagem');
        $extension = $requestImage->extension();

        // Gera um nome único pra imagem
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        // Move para pasta pública
        $requestImage->move(public_path('images/pets'), $imageName);

        // Salva o caminho no array validado
        $validated['imagem'] = 'images/pets/' . $imageName;
    }

    // Cria no banco
    Animal::create($validated);

    return redirect('/animais')->with('success', 'Animal cadastrado com sucesso!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
