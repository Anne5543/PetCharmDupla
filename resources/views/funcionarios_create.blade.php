<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

@section('content')
@include('layouts.navbar_admin')
<div class="main-content" style="padding-top: 200px; margin-left:200px;">
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card shadow">
                    <div style="text-align: center; margin-bottom: 10px;">
                        <h2>Criar Funcionário</h2>
                    </div>
                    <div class="card-body">
            
                        <form action="{{ route('funcionarios.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="nome" class="form-label">Nome:</label>
                                        <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="idade" class="form-label">Idade:</label>
                                        <input type="number" name="idade" class="form-control" id="idade" required placeholder="Idade">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="nivel_escolar" class="form-label">Nível Escolar:</label>
                                        <input type="text" name="nivel_escolar" class="form-control" id="nivel_escolar" placeholder="Nível Escolar" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="telefone" class="form-label">Telefone:</label>
                                        <input type="text" name="telefone" class="form-control" id="telefone" placeholder="(00) 0000-0000" required>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mb-3">
                                <button type="submit" class="btn btn-primary btn-lg me-3" style="width: 200px;">Salvar Funcionário</button>
                                <a href="{{ route('funcionarios_admin') }}" class="btn btn-danger btn-lg" style="width: 200px;">Cancelar</a>
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




