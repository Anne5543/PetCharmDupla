<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            height: 100vh;
            font-family: 'Nunito', sans-serif;
            display: flex;
            flex-direction: column;
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
            margin-left: 250px;
            padding: 1rem;
            padding-top: 100px;
            transition: 0.3s;
            width: calc(100% - 250px);
            flex: 1;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                width: 100%;
                padding-top: 80px;
            }

            .l-navbar {
                width: 50%;
                left: -100%;
            }

            .l-navbar.show {
                left: 0;
            }
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
    </style>
</head>

<body>
    @section('content')
    @include('layouts.navbar_admin')
    <div class="container mt-5 main-content">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Funcionarios</h5>
                        <p class="card-text">Todos os funcionarios cadastrados.</p>
                        <a href="{{route('funcionarios_admin')}}" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Agendamento de serviços</h5>
                        <p class="card-text">Todos os agendamentos.</p>
                        <a href="{{ route('agendamentos.admin') }}" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Feedback</h5>
                        <p class="card-text">Todos os Feedbacks.</p>
                        <a href="{{route('feedbacks_admin')}}" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
      
       





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>