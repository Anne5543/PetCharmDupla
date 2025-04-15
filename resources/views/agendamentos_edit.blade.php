<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agendamento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center">

    @section('content')
    @include('layouts.navbar_admin')

    <div class="w-full px-4 py-6">
        <a href="{{ route('dashboard') }}" class="text-white bg-purple-600 hover:bg-purple-700 rounded-md py-2 px-4 inline-block">
            ← Voltar para o Painel
        </a>
    </div>

    <div class="w-full max-w-3xl mx-auto mt-10 px-4">
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
                        <input type="tel" name="telefone" id="telefone" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="(00) 0000-0000" value="{{ $agendamento->telefone }}" required>
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
</body>

</html>