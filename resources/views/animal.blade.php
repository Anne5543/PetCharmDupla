<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Animais</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-purple-50 font-sans">

    @section('content')
    @include('layouts.navigation')<br><br><br>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: absolute; top: 70px; left: 50%; transform: translateX(-50%); width: 90%; z-index: 1000; display: block;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
     @endif

     @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="position: absolute; top: 70px; left: 50%; transform: translateX(-50%); width: 90%; z-index: 1000;">
        <strong>Erro(s):</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif



    <div class="container mx-auto py-10 px-4">

        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('animais.index') }}" class="text-purple-600 hover:text-purple-800 text-lg font-semibold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Voltar
            </a>
            <h1 class="text-4xl font-bold text-gray-800">Lista de Animais</h1>
            <button onclick="mostrarFormulario()" class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2 rounded-lg shadow-lg transition">
                + Criar
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-xl p-8 mb-8 hidden mx-auto max-w-lg" id="formulario">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Cadastrar Novo Animal</h2>

            <form action="{{ route('animais.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label for="imagem" class="block text-sm font-medium text-purple-700 mb-2">Imagem do Animal:</label>
                    <input type="file" id="imagem" name="imagem" accept="image/*" class="w-full border-2 border-purple-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                </div>

                <div>
                    <label for="nome" class="block text-sm font-medium text-purple-700 mb-2">Nome do Animal:</label>
                    <input type="text" id="nome" name="nome" required class="w-full border-2 border-purple-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                </div>

                <div>
                    <label for="peso" class="block text-sm font-medium text-purple-700 mb-2">Peso (kg):</label>
                    <input type="number" id="peso" name="peso" step="0.01" required class="w-full border-2 border-purple-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                </div>

                <div>
                    <label for="idade" class="block text-sm font-medium text-purple-700 mb-2">Idade (anos):</label>
                    <input type="number" id="idade" name="idade" required class="w-full border-2 border-purple-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg transition duration-200">
                        Salvar Animal
                    </button>
                </div>
                
            </form>
    </div>
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
                <div class="mt-6 flex flex-col sm:flex-row gap-2 sm:gap-4">
                    <a href="{{ route('animais.edit', $animal->id) }}" class="flex-1 text-center bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">
                        Editar
                    </a>

                    <form action="{{ route('animais.destroy', $animal->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Tem certeza que deseja excluir este animal?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md">
                            Excluir
                        </button>
                    </form>
                   
                </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>