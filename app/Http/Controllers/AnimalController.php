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
        $animais = Animal::where('user_id', auth()->user()->id)->get();
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
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'peso' => 'required|numeric',
        'idade' => 'required|numeric',
        'imagem' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
        $requestImage = $request->file('imagem');
        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('images/pets'), $imageName);
    

        $validated['imagem'] = 'images/pets/' . $imageName;
    }

    $validated['user_id'] = auth()->user()->id;

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
        $animal = Animal::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('animal_edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $animal = Animal::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'peso' => 'required|numeric',
        'idade' => 'required|numeric',
        'imagem' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('imagem')) {
        $imagem = $request->file('imagem');
        $nomeImagem = md5($imagem->getClientOriginalName() . strtotime("now")) . '.' . $imagem->extension();
        $imagem->move(public_path('images/pets'), $nomeImagem);
        $validated['imagem'] = 'images/pets/' . $nomeImagem;
    }

    $animal->update($validated);

    return redirect()->route('animais.index')->with('success', 'Animal atualizado com sucesso!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
   
    $animal = Animal::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
    
    if ($animal->imagem && file_exists(public_path($animal->imagem))) {
        unlink(public_path($animal->imagem));
    }

    $animal->delete();

    return redirect()->route('animais.index')->with('success', 'Animal excluído com sucesso!');

    }
}
