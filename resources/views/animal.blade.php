<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Animais</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

@section('content')
@include('layouts.navigation')<br><br><br>

<div class="container mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-4xl font-bold text-gray-800">Lista de Animais</h1>
        <button onclick="mostrarFormulario()" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow transition">
            + Criar
        </button>
    </div>

    
    <div class="bg-white rounded-lg shadow p-6 mb-8 hidden" id="formulario">
        <h2 class="text-2xl font-semibold mb-6 text-gray-700">Cadastrar Novo Animal</h2>

        <form action="{{ route('animais.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Imagem:</label>
                <input type="file" id="image" name="image" accept="image/*" class="form-control-file w-full border border-gray-300 rounded-lg px-4 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Nome:</label>
                <input type="text" name="nome" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Peso (kg):</label>
                <input type="number" step="0.01" name="peso" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Idade:</label>
                <input type="number" name="idade" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="text-right">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg transition">
                    Salvar
                </button>
            </div>
        </form>
    </div>

    <!-- Cards dos animais -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($animais as $animal)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                @if ($animal->imagem)
                    <img src="{{ asset($animal->imagem) }}" alt="Imagem do animal" class="w-full h-48 object-cover">
                @endif
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $animal->nome }}</h3>
                    <p class="text-gray-600">Peso: {{ $animal->peso }} kg</p>
                    <p class="text-gray-600">Idade: {{ $animal->idade }} anos</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function mostrarFormulario() {
        const form = document.getElementById('formulario');
        form.classList.toggle('hidden');
    }
</script>

</body>
</html>
