<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Funcionário</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-gray-100">

    @section('content')
    @include('layouts.navbar_admin')

    <div class="px-4 py-6">
        <a href="{{ route('dashboard') }}" class="text-white bg-purple-600 hover:bg-purple-700 rounded-md py-2 px-4 inline-block">
            ← Voltar para o Painel
        </a>
    </div>


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
                        <input type="text" name="telefone" id="telefone-create" class="form-input mt-1 block w-full rounded-md border-2 border-gray-300 shadow-sm focus:border-purple-600" placeholder="(00) 0000-0000" required>
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

        <script>
            document.getElementById('telefone-create').addEventListener('input', function(event) {
                let input = event.target.value;

                input = input.replace(/\D/g, '');

                if (input.length > 11) {
                    input = input.substring(0, 11);
                }
                if (input.length <= 2) {
                    input = input.replace(/^(\d{0,2})/, '($1');
                } else if (input.length <= 7) {
                    input = input.replace(/^(\d{2})(\d{0,5})/, '($1) $2');
                } else {
                    input = input.replace(/^(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
                }

                event.target.value = input;
            });
        </script>
    </div>

    </div>
</body>

</html>