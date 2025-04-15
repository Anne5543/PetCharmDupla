<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">

    @section('content')
    @include('layouts.navbar_admin')

    <main class="max-w-7xl mx-auto px-4 py-24" style="margin-right: 100px;">
        <h3 class="text-4xl md:text-5xl font-bold text-center text-purple-700 mb-12">Painel Administrativo</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl p-6 text-center transition transform hover:-translate-y-1">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Funcionários</h2>
                <p class="text-gray-600 mb-4">Todos os funcionários cadastrados.</p>
                <a href="{{ route('funcionarios_admin') }}"
                    class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-lg transition">
                    Ver
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-md hover:shadow-xl p-6 text-center transition transform hover:-translate-y-1">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Agendamentos</h2>
                <p class="text-gray-600 mb-4">Visualize todos os agendamentos.</p>
                <a href="{{ route('agendamentos.admin') }}"
                    class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-lg transition">
                    Ver
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-md hover:shadow-xl p-6 text-center transition transform hover:-translate-y-1">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Feedbacks</h2>
                <p class="text-gray-600 mb-4">Veja os feedbacks dos usuários.</p>
                <a href="{{ route('feedbacks_admin') }}"
                    class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-lg transition">
                    Ver
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-md hover:shadow-xl p-6 text-center transition transform hover:-translate-y-1">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Meus Pets</h2>
                <p class="text-gray-600 mb-4">Visualize todos os pets cadastrados.</p>
                <a href=""
                    class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-lg transition">
                    Ver
                </a>
            </div>

        </div>
    </main>
    <div class="mt-16">
    <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Resumo do Sistema</h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 text-center">
        <!-- Usuários -->
        <div class="bg-white shadow-md rounded-xl p-6">
            <p class="text-sm text-gray-500">Total de Usuários</p>
            <h4 class="text-3xl font-bold text-purple-600">248</h4>
        </div>

        <!-- Pets -->
        <div class="bg-white shadow-md rounded-xl p-6">
            <p class="text-sm text-gray-500">Pets Cadastrados</p>
            <h4 class="text-3xl font-bold text-purple-600">134</h4>
        </div>

        <!-- Agendamentos -->
        <div class="bg-white shadow-md rounded-xl p-6">
            <p class="text-sm text-gray-500">Agendamentos</p>
            <h4 class="text-3xl font-bold text-purple-600">89</h4>
        </div>

        <!-- Feedbacks -->
        <div class="bg-white shadow-md rounded-xl p-6">
            <p class="text-sm text-gray-500">Feedbacks</p>
            <h4 class="text-3xl font-bold text-purple-600">42</h4>
        </div>
    </div>
</div>

</body>

</html>

