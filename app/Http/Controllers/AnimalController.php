<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAnimais;
use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{

    public function index()
    {
        $animais = Animal::where('user_id', auth()->user()->id)->get();
        return view('animal', compact('animais'));
    }

    public function create()
    {
        //
    }

    public function store(StoreUpdateAnimais $request)
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

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $animal = Animal::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('animal_edit', compact('animal'));
    }

    public function update(StoreUpdateAnimais $request, $id)
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
        } else {
            $validated['imagem'] = $animal->imagem; 
        }
    
        $validated['user_id'] = auth()->id(); 
    
        $animal->update($validated);
    
        return redirect()->route('animais.index')->with('success', 'Animal atualizado com sucesso!');
    }
    
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
