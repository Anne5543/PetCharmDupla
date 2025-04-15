<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    @section('content')
    @include('layouts.navbar_admin')

    <div class="px-4 py-6">
        <a href="{{ route('dashboard') }}"
           class="text-white bg-purple-600 hover:bg-purple-700 rounded-md py-2 px-4 inline-block">
            ← Voltar para o Painel
        </a>
    </div>

    <div class="container mx-auto px-4 mt-16">
        <h3 class="text-3xl font-semibold text-center text-purple-800 mb-6">Editar Funcionário</h3>

        <div class="bg-white p-6 rounded-lg shadow-md max-w-screen-lg mx-auto">
            <h4 class="text-center text-lg font-semibold text-purple-800 mb-4">Atualize os Dados do Funcionário</h4>

            <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="nome" class="block text-sm text-purple-800 mb-1">Nome:</label>
                        <input type="text" name="nome" id="nome" value="{{ $funcionario->nome }}"
                               class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-600"
                               required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm text-purple-800 mb-1">Email:</label>
                        <input type="email" name="email" id="email" value="{{ $funcionario->email }}"
                               class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-600"
                               required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label for="idade" class="block text-sm text-purple-800 mb-1">Idade:</label>
                        <input type="number" name="idade" id="idade" value="{{ $funcionario->idade }}"
                               class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-600"
                               required>
                    </div>

                    <div>
                        <label for="nivel_escolar" class="block text-sm text-purple-800 mb-1">Nível Escolar:</label>
                        <input type="text" name="nivel_escolar" id="nivel_escolar" value="{{ $funcionario->nivel_escolar }}"
                               class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-600"
                               required>
                    </div>

                    <div>
                        <label for="telefone" class="block text-sm text-purple-800 mb-1">Telefone:</label>
                        <input type="text" name="telefone" id="telefone" value="{{ $funcionario->telefone }}"
                               class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-600"
                               required>
                    </div>
                </div>

                <div class="flex justify-center gap-4">
                    <button type="submit"
                            class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-6 rounded-md text-lg">
                        Salvar
                    </button>
                    <a href="{{ route('funcionarios_admin') }}"
                       class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-6 rounded-md text-lg">
                        Cancelar
                    </a>
                </div>
            </form>

            @if ($errors->any())
                <div class="mt-6 text-red-600 text-sm">
                    @foreach($errors->all() as $error)
                        <p>• {{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

</body>

</html>
