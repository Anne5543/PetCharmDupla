<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Funcionário</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    @section('content')
    @include('layouts.navbar_admin')

    <div class="px-4 py-6">
        <a href="{{ route('dashboard') }}" class="text-white bg-purple-600 hover:bg-purple-700 rounded-md py-2 px-4 inline-block">
            ← Voltar para o Painel
        </a>
    </div>

    <div class="container mx-auto px-4 mt-16" style="margin-right:50px">
        <h3 class="text-3xl font-semibold text-center text-purple-800 mb-6">Criar Funcionário</h3><br><br><br>

        

        <div class="bg-white p-6 rounded-lg shadow-md max-w-screen-lg mx-auto">
            <h4 class="text-center text-lg font-semibold text-purple-800 mb-4">Preencha os Dados do Funcionário</h4>

            <form action="{{ route('funcionarios.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="nome" class="block text-sm text-purple-800">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-input mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-purple-600" placeholder="Nome" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm text-purple-800">Email:</label>
                        <input type="email" name="email" id="email" class="form-input mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-purple-600" placeholder="Email" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label for="idade" class="block text-sm text-purple-800">Idade:</label>
                        <input type="number" name="idade" id="idade" class="form-input mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-purple-600" placeholder="Idade" required>
                    </div>

                    <div>
                        <label for="nivel_escolar" class="block text-sm text-purple-800">Nível Escolar:</label>
                        <input type="text" name="nivel_escolar" id="nivel_escolar" class="form-input mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-purple-600" placeholder="Nível Escolar" required>
                    </div>

                    <div>
                        <label for="telefone" class="block text-sm text-purple-800">Telefone:</label>
                        <input type="text" name="telefone" id="telefone" class="form-input mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-purple-600" placeholder="(00) 0000-0000" required>
                    </div>
                </div>

                <div class="flex justify-center mb-6">
                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md text-lg">Salvar Funcionário</button>
                    <a href="{{ route('funcionarios_admin') }}" class="ml-4 bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md text-lg">Cancelar</a>
                </div>
            </form>

            @if ($errors->any())
                <div class="mt-4 text-red-600">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

</body>

</html>






