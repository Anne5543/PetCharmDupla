<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            height: 100vh;
            font-family: 'Nunito', sans-serif;
            display: flex;
            flex-direction: column;
        }

        .header {
            width: 100%;
            height: 80px;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: #7c137b;
            z-index: 100;
            transition: 0.3s;
        }

        .nomeUsuario {
            margin-right: 10px;
            color: white;
            font-family: 'Nunito', sans-serif;
        }

        .header_toggle {
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .profile_container {
            display: flex;
            align-items: center;
        }

        .l-navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: #7c137b;
            padding: 0.5rem 1rem 0;
            transition: 0.3s;
            z-index: 99;
        }

        .nav {
            background-color: #7c137b;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 2rem 0;
        }

        .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: 0.5rem 1.5rem;
        }

        .nav_link {
            position: relative;
            color: #c2c7d0;
            margin-bottom: 1.5rem;
            transition: 0.3s;
        }

        .nav_link:hover {
            color: white;
        }

        .show {
            left: 0;
        }

        .active {
            color: white;
        }

        .active::before {
            content: '';
            position: absolute;
            left: 0;
            width: 2px;
            height: 32px;
            background-color: white;
        }

        .main-content {
            padding: 1rem;
            padding-top: 100px;
            transition: 0.3s;
            flex: 1;
        }

        @media (max-width: 768px) {
            .l-navbar {
                width: 50%;
                left: -100%;
            }

            .l-navbar.show {
                left: 0;
            }
        }

        .main-content {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    @section('content')
    @include('layouts.navbar_admin')

    <h3 style="padding-top: 140px; margin-left:20% ">Editar agendamento</h3>
    <div class="main-content" style="padding-top: 15px; margin-left:200px;">
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card shadow">
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h2>Editar agendamento</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('agendamentos.update', $agendamento->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome:</label>
                                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" value="{{$agendamento->nome}}" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{$agendamento->email}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="telefone" class="form-label">Telefone:</label>
                                            <input type="tel" name="telefone" class="form-control" id="telefone" placeholder="(00) 0000-0000" value="{{$agendamento->telefone}}" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="data" class="form-label">Data:</label>
                                            <input type="date" name="data" class="form-control" id="data" value="{{$agendamento->data}}" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="hora" class="form-label">Hora:</label>
                                            <input type="time" name="hora" class="form-control" id="hora" value="{{$agendamento->hora}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="especie" class="form-label">Espécie do Animal:</label>
                                    <input type="text" name="especie" class="form-control" id="especie" placeholder="Espécie do Animal" value="{{$agendamento->especie}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="especie" class="form-label">Meu pet:</label>
                                    <input type="text" name="meu_pet" class="form-control" id="meu_pet" placeholder="Meu pet" value="{{$agendamento->meu_pet}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="servico" class="form-label">Serviço:</label>
                                    <select class="form-select" id="servico" name="servico" required>
                                        <option value="" disabled selected hidden>Selecione o serviço desejado</option>

                                        @foreach($servicos as $servico)
                                        <option value="{{ $servico->id }}"
                                            {{ $agendamento->id_services == $servico->id ? 'selected' : '' }}>
                                            {{ $servico->nome }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="d-flex justify-content-center mb-3">
                                    <button type="submit" class="btn btn-primary btn-lg me-3" style="width: 200px;">Salvar Alterações</button>
                                    <a href="{{ route('agendamentos.admin') }}" class="btn btn-danger btn-lg" style="width: 200px;">Cancelar</a>
                                </div>
                        </form>

                        @if ($errors -> any())
                            @foreach($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>