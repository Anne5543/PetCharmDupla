<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .main-content {
            margin-top: 90px;
            padding: 1rem;
            flex: 1;
        }

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

      

        .table-container {
            border: 1px solid #dee2e6;
            padding: 1rem;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .table-container .btn {
            margin: 0 0.2rem;
        }

        .table-container .btn-danger {
            margin-left: 0;
        }

        .footer-table-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .table thead th {
            background-color: #f8f9fa;
        }

        .table th,
        .table td {
            white-space: nowrap;
            padding: 0.75rem;
            text-align: center;
        }

        .table-container .btn {
            margin-right: 5px;
        }
        table td,
        .table th {
            padding: 0.5rem;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .table-responsive-sm {
                overflow-x: auto;
            }

            .table td,
            .table th {
                padding: 0.3rem;
            }
        }

        .footer-table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            transition: 0.3s;
            width: 100%;
            flex-direction: column;
        }

        @media (max-width: 768px) {
            .footer-table-container {
                width: 100%;
                height: auto;
            }

            .table-container {
                overflow-x: auto;
            }
        }

        .table-container {
            border: 1px solid #dee2e6;
            padding: 1rem;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 900px;
        }

        .table {
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            background-color: #f8f9fa;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-sm th,
        .table-sm td {
            padding: 0.3rem;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }

        .table th,
        .table td {
            width: 20%;
            padding: 0.5rem;
        }
        *{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
</head>

<body>
@section('content')
@include('layouts.navbar_admin')

    <h3 style="padding-top: 140px; margin-left:20%">Todos os Agendamentos</h3>

    @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: absolute; top: 80px; left: 50%; transform: translateX(-50%); width: 90%; z-index: 1000; display: block;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif

    <div class="main-content" style="margin-left:200px; margin-top: 30px">
        <div class="footer-table-container">
            <div class="table-container table-responsive-sm">
                <h3 class="text-center">Agendamentos</h3>
                <p class="text-center text-muted">O total de Total de Agendamentos: <strong>XX</strong></p>
                <table class="table table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Espécie</th>
                            <th scope="col">Meu pet</th>
                            <th scope="col">Serviço</th>
                    
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agendamentos as $agendamento)
                                <tr>
                                    <td>{{ $agendamento->id }}</td>
                                    <td>{{ $agendamento->nome }}</td>
                                    <td>{{ $agendamento->email }}</td>
                                    <td>{{ $agendamento->telefone }}</td>
                                    <td>{{ $agendamento->data }}</td>
                                    <td>{{ $agendamento->hora }}</td>
                                    <td>{{ $agendamento->especie }}</td>
                                    <td>{{ $agendamento->meu_pet }}</td>
                                    <td>{{ $agendamento->service->nome }}</td>
                                    <td>
                                        <a href="{{ route('agendamentos.edit', $agendamento->id) }}" class="btn btn-warning text text-white btn-sm">Editar</a>

                                        <form action="{{ route('agendamentos.destroy', ['agendamento' => $agendamento->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($agendamentos->isEmpty())
                                <tr>
                                    <td colspan="10" class="text-center text-muted">Nenhum Agendamento encontrado.</td>
                                </tr>
                            @endif
                        </tbody>
                </table>
            </div>
        </div>
    </div>

    

  





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>