<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agendamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center">

    @section('content')
    @include('layouts.navbar_admin')

    <div class="w-full px-4 py-6">
    </div>
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

    <div class="w-full max-w-3xl mx-auto mt-9 px-4">
        <h3 class="text-3xl font-semibold text-center text-purple-800 mb-6">Editar Agendamento</h3>


        <div class="bg-white p-6 rounded-lg shadow-md mx-auto overflow-x-auto">
            <form action="{{ route('agendamentos.update', $agendamento->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome:</label>
                        <input type="text" name="nome" id="nome" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Nome" value="{{ $agendamento->nome }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Email" value="{{ $agendamento->email }}" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone:</label>
                        <input type="tel" name="telefone" id="telefone-edit" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="(00) 0000-0000" value="{{ $agendamento->telefone }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="data" class="block text-sm font-medium text-gray-700">Data:</label>
                        <input type="date" name="data" id="data" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ $agendamento->data }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="hora" class="block text-sm font-medium text-gray-700">Hora:</label>
                        <input type="time" name="hora" id="hora" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ $agendamento->hora }}" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="especie" class="block text-sm font-medium text-gray-700">Espécie do Animal:</label>
                    <input type="text" name="especie" id="especie" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Espécie do Animal" value="{{ $agendamento->especie }}" required>
                </div>

                <div class="mb-4">
                    <label for="pet_id" class="block text-sm font-medium text-gray-700">Nome do pet:</label>
                    <input type="text" name="pet_id" id="pet_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                        placeholder="Meu pet" value="{{ $agendamento->pet->nome }}" readonly>
                </div>
                <input type="hidden" name="pet_id" value="{{ $agendamento->pet_id }}">

                <div class="mb-4">
                    <label for="servico" class="block text-sm font-medium text-gray-700">Serviço:</label>
                    <select name="servico" id="servico" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                        <option value="" disabled selected>Selecione o serviço desejado</option>
                        @foreach($servicos as $servico)
                        <option value="{{ $servico->id }}" {{ $agendamento->id_services == $servico->id ? 'selected' : '' }}>
                            {{ $servico->nome }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-center gap-4">
                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-md w-40">Salvar Alterações</button>
                    <a href="{{ route('agendamentos.admin') }}" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md w-40 text-center">Cancelar</a>
                </div>
            </form>

            @if ($errors->any())
            <div class="mt-4">
                @foreach($errors->all() as $error)
                <p class="text-red-500 text-sm">{{ $error }}</p>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    <script>
        document.getElementById('telefone-edit').addEventListener('input', function(event) {
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>