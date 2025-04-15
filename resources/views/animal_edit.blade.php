<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg p-10 w-full max-w-2xl">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Editar Informações do Pet</h1>

            <form action="{{ route('animais.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Imagem Atual:</label>
                    @if($animal->imagem)
                    <img src="{{ asset($animal->imagem) }}" class="w-32 h-32 object-cover rounded mb-3 shadow">
                    @else
                    <p class="text-gray-500">Nenhuma imagem disponível.</p>
                    @endif
                    <input type="file" name="imagem" accept="image/*" class="w-full border border-gray-300 rounded px-4 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nome:</label>
                    <input type="text" name="nome" value="{{ $animal->nome }}" required class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Peso (kg):</label>
                    <input type="number" step="0.01" name="peso" value="{{ $animal->peso }}" required class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Idade (anos):</label>
                    <input type="number" name="idade" value="{{ $animal->idade }}" required class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg shadow transition">
                        Atualizar Pet
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>