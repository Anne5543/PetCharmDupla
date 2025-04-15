<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: absolute; top: 70px; left: 50%; transform: translateX(-50%); width: 90%; z-index: 1000; display: block;">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<body class="bg-gray-100">

    @section('content')
    @include('layouts.navbar_admin')

    <div class="w-full px-4 py-6">
        <a href="{{ route('dashboard') }}" class="text-white bg-purple-600 hover:bg-purple-700 rounded-md py-2 px-4 inline-block">
            ← Voltar para o Painel
        </a>
    </div>

    <div class="w-full max-w-5xl mx-auto mt-10 px-4">
        <h3 class="text-3xl font-semibold text-center text-purple-800 mb-6">Todos os Feedbacks</h3>

        <div class="bg-white p-6 rounded-lg shadow-md mx-auto max-w-4xl overflow-x-auto">
            <h4 class="text-center text-lg font-semibold text-purple-800 mb-4">Lista de Feedbacks</h4>
            <p class="text-center text-gray-600 mb-6">Total de Feedbacks: <strong>{{ count($feedbacks) }}</strong></p>

            <table class="table-auto w-full text-sm text-gray-700 text-left">
                <thead>
                    <tr class="text-purple-800 border-b border-gray-300">
                        <th class="px-2 py-2">ID</th>
                        <th class="px-2 py-2">Nome</th>
                        <th class="px-2 py-2">Telefone</th>
                        <th class="px-2 py-2">Email</th>
                        <th class="px-2 py-2">Comentário</th>
                        <th class="px-2 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $feedback)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-2 py-2">{{ $feedback->id }}</td>
                        <td class="px-2 py-2">{{ $feedback->nome }}</td>
                        <td class="px-2 py-2">{{ $feedback->telefone }}</td>
                        <td class="px-2 py-2">{{ $feedback->email }}</td>
                        <td class="px-2 py-2">{{ $feedback->comentario }}</td>
                        <td class="px-2 py-2 flex gap-2">
                            <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este feedback?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($feedbacks->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-4">Nenhum feedback encontrado.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>