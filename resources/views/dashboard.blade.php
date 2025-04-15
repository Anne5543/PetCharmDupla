<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>


</head>

<body class="font-sans bg-gray-100">
    @section('content')
    @include('layouts.navigation')



    <div id="inicio" style="position: relative;">
        <img src="{{ asset('images/banner.png') }}" alt="Banner" class="banner">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: absolute; top: 70px; left: 50%; transform: translateX(-50%); width: 90%; z-index: 1000; display: block;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div id="sobre" style="background-color: #f9e1fc;">
        <img src="{{ asset('images/sobre.png') }}" alt="Banner" class="banner">
    </div>


    <div id="serviços" class="container">
        <h1 style="margin-bottom:-60px; text-align: center;">Serviços</h1>
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col mt-3">
                <div class="card shadow" style="transform: scale(0.72);">
                    <img class="card-img-top" src="./images/banho.png" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Banhos <span style="margin-left: 185px">R$ 25,00</span></h4>
                        <p class="card-text"> Oferecemos banhos completos com produtos de alta qualidade, garantindo higiene e bem-estar para seu pet.</p>
                    </div>
                </div>
            </div>

            <div class="col mt-3">
                <div class="card shadow" style="transform: scale(0.72);">
                    <img class="card-img-top" src="./images/tosa.jpg" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Tosa<span style="margin-left: 230px">R$ 30,00</span></h4>
                        <p class="card-text">Nosso pet shop oferece serviços de tosa especializados, adequados às necessidades e ao estilo de cada animal.</p>
                    </div>
                </div>
            </div>

            <div class="col mt-3">
                <div class="card shadow" style="transform: scale(0.72);">
                    <img class="card-img-top" src="./images/consultas.jpg" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Consultas<span style="margin-left: 150px">R$ 100,00</span></h4>
                        <p class="card-text" style="text-align:justify;">No nosso pet shop, entendemos o quanto seu animal de estimação significa para você. É por isso que oferecemos consultas veterinárias.</p>
                    </div>
                </div>
            </div>
            <div class="col mt-3">
                <div class="card shadow" style="transform: scale(0.72);">
                    <img class="card-img-top" src="./images/adestramento.jpg" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Adestramento <span style="margin-left: 20px">R$ 90,00(Sessão)</span></h4>
                        <p class="card-text" style="text-align:justify;">Oferecemos serviços de adestramento dedicados a promover uma convivência harmoniosa entre você e seu animal de estimação.</p>
                    </div>
                </div>
            </div>
            <div class="col mt-3">
                <div class="card shadow" style="transform: scale(0.72);">
                    <img class="card-img-top" src="./images/grooming.jpg" alt="Card image" style="height: 230px;">
                    <div class="card-body">
                        <h4 class="card-title">Grooming <span style="margin-left: 150px">R$ 120,00</span></h4>
                        <p class="card-text">Nosso pet shop oferece serviços de grooming completos, que incluem banho, tosa, corte de unhas, limpeza de ouvidos e hidratação. </p>
                    </div>
                </div>
            </div>

            <div class="col" style="margin-top: 12%;">
                <div style="transform: scale(0.72);">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Agende agora os nossos Serviços</h4><br>
                        <p class="card-text" style="text-align: center;"><a href="#agendamentos"><button type="submit" class="btn btn-primary">Agendar</button></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br>
    <section id="agendamentos" class="min-h-screen from-pink-100 via-purple-100 to-blue-100 flex items-center justify-center px-4 py-12">
        <div class="backdrop-blur-xl bg-white/70 shadow-xl rounded-3xl max-w-2xl w-full p-8 border border-purple-100" style="background-color: #f0f0f0;">
            <h2 class="text-4xl font-extrabold text-center text-purple-800 mb-4">Agendamento de Serviços</h2>
            <p class="text-center text-gray-600 mb-8">Atendimento de <span class="font-medium">segunda a sábado</span>, das <span class="font-medium">8h às 18h</span></p>
            <form action="{{ route('agendamentos.store') }}" method="post">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="relative">
                        <label class="block mb-1 font-medium text-gray-700">Nome<span class="text-red-500">*</span></label>
                        <input type="text" name="nome" placeholder="Seu nome" class="w-full rounded-xl px-4 py-3 pl-11 border border-gray-300 focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm">
                        <span class="absolute top-[px] left-2 text-gray-400" style="margin-top: 15px;"><i class="fas fa-user"></i></span>
                    </div>

                    <div class="relative">
                        <label class="block mb-1 font-medium text-gray-700">Email<span class="text-red-500">*</span></label>
                        <input type="email" name="email" placeholder="Seu email" class="w-full rounded-xl px-4 py-3 pl-11 border border-gray-300 focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm">
                        <span class="absolute top-[38px] left-2 text-gray-400"><i class="fas fa-envelope" style="margin-top: 20px;"></i></span>
                    </div>
                    <div class="relative">
                        <label class="block mb-1 font-medium text-gray-700">Telefone<span class="text-red-500">*</span></label>
                        <input type="text" name="telefone" id="telefone-agendamento" max="11" placeholder="(00) 00000-0000"
                            class="w-full rounded-xl px-4 py-3 pl-11 border border-gray-300 focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm">
                        <span class="absolute top-[38px] left-2 text-gray-400"><i class="fas fa-phone" style="margin-top: 22px;"></i></span>
                    </div>


                    <div class="relative">
                        <label class="block mb-1 font-medium text-gray-700">Data<span class="text-red-500">*</span></label>
                        <input type="date" name="data" class="w-full rounded-xl px-4 py-3 pl-11 border border-gray-300 focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm" value="{{ old('data', $agendamento->data ?? '') }}">
                        <span class="absolute top-[38px] left-2 text-gray-400"><i class="fas fa-calendar-alt" style="margin-top: 20px;"></i></span>
                    </div>


                    <div class="relative">
                        <label class="block mb-1 font-medium text-gray-700">Hora<span class="text-red-500">*</span></label>
                        <input type="time" name="hora" class="w-full rounded-xl px-4 py-3 pl-11 border border-gray-300 focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm">
                        <span class="absolute top-[38px] left-2 text-gray-400"><i class="fas fa-clock" style="margin-top: 20px;"></i></span>
                    </div>

                    <div class="relative">
                        <label class="block mb-1 font-medium text-gray-700">Espécie do Animal<span class="text-red-500">*</span></label>
                        <input type="text" name="especie" placeholder="Ex: Cachorro, Gato..." class="w-full rounded-xl px-4 py-3 pl-11 border border-gray-300 focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm">
                        <span class="absolute top-[38px] left-2 text-gray-400"><i class="fas fa-paw" style="margin-top: 20px;"></i></span>
                    </div>


                    <div class="relative">
                        <label class="block mb-1 font-medium text-gray-700">Selecione o seu Pet<span class="text-red-500">*</span></label>
                        <span class="absolute top-[38px] left-2 text-gray-400"><i class="fas fa-dog" style="margin-top: 20px;"></i></span>


                        <select class="form-select w-full rounded-xl px-4 py-3 pl-11 border border-gray-300 focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm" id="pet" name="pet_id" required>
                            <option value="" disabled selected>Selecione um pet</option>
                            @foreach ($pets as $pet)
                            <option value="{{ $pet->id }}">{{ $pet->nome }}</option>
                            @endforeach
                        </select>
                        @if ($errors -> any())
                @foreach($errors->all() as $error)
                {{$error}}
                @endforeach
                @endif
                    </div>



                    <div class="relative ">
                        <label class="block mb-1 font-medium text-gray-700">Serviço<span class="text-red-500">*</span></label>
                        <span class="absolute top-[38px] left-2 text-gray-400"><i class="fas fa-briefcase" style="margin-top: 20px;"></i></span>
                        <select class="form-select w-full rounded-xl px-4 py-3 pl-11 border border-gray-300 focus:ring-2 focus:ring-purple-400 focus:outline-none shadow-sm " id="servico" name="servico" required>

                            <option value="" disabled selected>Selecione um serviço</option>
                            @foreach ($servicos as $servico)
                            <option value="{{ $servico->id }}">{{ $servico->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <button type="submit" class="bg-gradient-to-r from-purple-600 to-pink-600 hover:from-pink-600 hover:to-purple-600 text-white font-bold py-3 px-8 rounded-full shadow-lg transition-all duration-300">
                        Agendar
                    </button>
                </div>

                </ul>
        </div>
        </form>

    </section>

    <div id="contatos" style="margin-top: 50px;">
        <div id="forcon" class="container">
            <div id="cont">
                <h1>FALE CONOSCO</h1>
                <p>Para entrar em contato com a nossa equipe, por favor, preencha o formulário abaixo.</p>
                <form action="{{ route('feedback.store') }}" method="post">
                    @csrf
                    <label style="font-size: 18px;"><strong>Nome: <span style="color: red;">*</span></strong></label><br>
                    <input type="text" name="nome" placeholder="Digite seu nome"><br>
                    <label style="font-size: 18px;"><strong>Telefone: <span style="color: red;">*</span></strong></label><br>
                    <input type="text" name="telefone" class="form-control" id="telefone-contato" placeholder="(00) 0000-0000" required>
                    <label style="font-size: 18px;"><strong>Email: <span style="color: red;">*</span></strong></label><br>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu email" required>
                    <label style="font-size: 18px;"><strong>Seu Comentário: <span style="color: red;">*</span></strong></label><br>
                    <input type="text" name="comentario" placeholder="Digite seu Comentário"><br>
                    <input class="btn btn-primary" type="submit" value="ENVIAR" style=" width: 120px;"></input>
                </form>
                <a href="" class="btn-icon" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                    <img src="{{ asset('images/feedbacks.png') }}" style="height:40px; width:40px; margin-left:25%; margin-top:-50px;" alt="feedback">
                </a>
                @if ($errors -> any())
                @foreach($errors->all() as $error)
                {{$error}}
                @endforeach
                @endif


            </div>

            <div id="formasc">
                <h2>Formas de contato</h2>
                <h5>EMAIL:</h5>
                <p>anne.brandao@aluno.ce.gov.br</p>
                <h5>TELEFONE:</h5>
                <p>(88)9 1234-5678</p>
                <h5>LOCALIZAÇÃO:</h5>
                <p>Bairro nossa senhora de fátima, Russas-CE</p>
            </div>
        </div>


        <footer class="foo1">
            <div class="container text-center mt-5">
                <a href="https://www.facebook.com/annecarolineteixeira.brandao.5?locale=pt_BR" class="btn btn-primary btn-icon btn-facebook" target="_blank">
                    <img src="{{asset('images/facebook.png')}}" style=" height:50px; width:50px; margin-left:20%;   " alt="facebook">
                </a>
                <a href="https://x.com/Anne67583888" class="btn btn-dark" target="_blank" style="color:#000">
                    <img src="{{asset('images/x.png')}}" alt="Twitter" style="margin-top:5px; height:35px; width:35px; margin-left:28%;">
                </a>
                <a href="https://www.instagram.com/annecarolinetei/" class="btn" target="_blank" style="background-image: linear-gradient(45deg, #405de6,#5851db, #833ab4, #c13584, #e1306c, #fd1d1d);  padding: 10px;">
                    <img src="{{asset('images/instagram.png')}}" alt="instagram" style="margin-top: -15px; height: 70px; width: 70px; display: block; margin-left:5%;">
                </a>
            </div>
    </div>
    </footer>
    <footer class="foo2">
        <p>&copy;2024. Todos os direitos reservados.</p>
    </footer>


    <div>
        <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="feedbackModalLabel">Feedbacks Enviados</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if(isset($feedbacks) && $feedbacks->isNotEmpty())
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Comentário</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedbacks as $feedback)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $feedback->comentario }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning text text-white" data-bs-toggle="modal" data-bs-target="#editFeedbackModal{{ $feedback->id }}" style="height:38px">Editar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>Nenhum feedback encontrado.</p>
                        @endif

                    </div>

                </div>
            </div>
        </div>
        @foreach ($feedbacks as $feedback)
        <div class="modal fade" id="editFeedbackModal{{ $feedback->id }}" tabindex="-1" aria-labelledby="editFeedbackModalLabel{{ $feedback->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editFeedbackModalLabel{{ $feedback->id }}">Editar Feedback</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('feedbacks.update', $feedback->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome" value="{{ $feedback->nome }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="telefone" class="form-label" id="telefone-modal">Telefone</label>
                                <input type="text" class="form-control" name="telefone" id="telefone" value="{{ $feedback->telefone }}" required oninput="mascaraTelefone(this)">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $feedback->email }}" required>
                            </div>


                            <div class="mb-3">
                                <label for="comentario" class="form-label">Comentário</label>
                                <textarea class="form-control" name="comentario" id="comentario" rows="4" required>{{ $feedback->comentario }}</textarea>
                            </div>


                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        @endforeach


        <script>
            document.getElementById('telefone-agendamento').addEventListener('input', function(event) {
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
        <script>
            document.getElementById('telefone-contato').addEventListener('input', function(event) {
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
    </div>
</body>

</html>