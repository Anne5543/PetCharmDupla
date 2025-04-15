<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Funcionários</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .table-container {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow-x: auto;
        }

        .table th,
        .table td {
            padding: 0.75rem;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(148, 163, 184, 0.1);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(75, 85, 99, 0.2);
        }
    </style>
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
        <h3 class="text-3xl font-semibold text-center text-purple-800 mb-6">Gerenciamento de Funcionários</h3>

        <div class="flex justify-end mb-6">
            <a href="{{ route('funcionarios.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-md">
                Criar Funcionário
            </a>
        </div>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show fixed top-0 left-1/2 transform -translate-x-1/2 w-11/12 z-50 mt-16">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <br>

        <div class="table-container bg-white p-6 rounded-lg shadow-md max-w-screen-lg mx-auto">
            <h4 class="text-center text-lg font-semibold text-purple-800 mb-4">Lista de Funcionários</h4>
            <p class="text-center text-muted mb-6">O total de Agendamentos: <strong>{{ count($funcionarios) }}</strong></p>

            <table class="table table-striped table-hover table-sm w-full">
                <thead>
                    <tr>
                        <th class="text-left text-sm text-purple-800">ID</th>
                        <th class="text-left text-sm text-purple-800">Nome</th>
                        <th class="text-left text-sm text-purple-800">Email</th>
                        <th class="text-left text-sm text-purple-800">Idade</th>
                        <th class="text-left text-sm text-purple-800">Nível Escolar</th>
                        <th class="text-left text-sm text-purple-800">Telefone</th>
                        <th class="text-left text-sm text-purple-800">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($funcionarios as $funcionario)
                    <tr>
                        <td class="text-sm text-gray-800">{{ $funcionario->id }}</td>
                        <td class="text-sm text-gray-800">{{ $funcionario->nome }}</td>
                        <td class="text-sm text-gray-800">{{ $funcionario->email }}</td>
                        <td class="text-sm text-gray-800">{{ $funcionario->idade }}</td>
                        <td class="text-sm text-gray-800">{{ $funcionario->nivel_escolar }}</td>
                        <td class="text-sm text-gray-800">{{ $funcionario->telefone }}</td>
                        <td class="text-sm">
                            <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="bg-yellow-400 hover:bg-yellow-800 text-white px-3 py-1 rounded-md text-xs">Editar</a>
                            <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($funcionarios->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center text-gray-500">Nenhum funcionário encontrado.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>