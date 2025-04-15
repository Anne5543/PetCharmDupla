<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-purple-50 font-sans">

    <div class="min-h-screen flex items-center justify-center py-8 px-4">
        <div class="bg-white shadow-2xl rounded-lg p-6 w-full max-w-2xl border-t-4 border-purple-600">
            
            <div class="mb-4">
                <a href="{{ route('animais.index') }}" class="text-purple-600 hover:text-purple-700 font-semibold text-lg inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5"></path>
                        <path d="M12 5l-7 7 7 7"></path>
                    </svg>
                    Voltar
                </a>
            </div>

            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Editar Informações do Pet</h1>
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


            <form action="{{ route('animais.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6 text-center">
                    <label class="block text-sm font-medium text-purple-700 mb-2">Imagem Atual:</label>
                    <div class="flex items-center justify-center mb-4">
                        @if($animal->imagem)
                        <img src="{{ asset($animal->imagem) }}" class="w-32 h-32 object-cover rounded-full border-4 border-purple-200 shadow-lg">
                        @else
                        <p class="text-gray-500">Nenhuma imagem disponível.</p>
                        @endif
                    </div>
                    <input type="file" name="imagem" accept="image/*" class="w-full border-2 border-purple-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-500 transition duration-300 ease-in-out">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-purple-700 mb-2">Nome:</label>
                    <input type="text" name="nome" value="{{ $animal->nome }}" required class="w-full border-2 border-purple-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 transition duration-300 ease-in-out">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-purple-700 mb-2">Peso (kg):</label>
                    <input type="number" step="0.01" name="peso" value="{{ $animal->peso }}" required class="w-full border-2 border-purple-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 transition duration-300 ease-in-out">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-purple-700 mb-2">Idade (anos):</label>
                    <input type="number" name="idade" value="{{ $animal->idade }}" required class="w-full border-2 border-purple-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 transition duration-300 ease-in-out">
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-8 py-3 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        Atualizar Pet
                    </button>
                </div>
                
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
