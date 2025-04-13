<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - PetCharm</title>
    <link rel="stylesheet" href="cadastro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: rgb(226, 171, 240);
        }
    </style>
</head>

<body>
    <div class="login">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="formulario">
                <h1 class="destaque">PetCharm</h1>
                <p class="destaque">Cadastre-se para cuidar ainda melhor do seu pet! 🐾</p>

                <div class="mb-3">
                    <label for="name" class="form-label">Digite seu nome:</label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Digite seu nome" required autofocus style="width: 90%; margin-left:5%">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Digite seu e-mail:</label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="Digite seu e-mail" required style="width: 90%; margin-left:5%">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Digite sua senha:</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Digite sua senha" required style="width: 90%; margin-left:5%">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirme a sua senha:</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirme sua senha" required style="width: 90%; margin-left:5%">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <button type="button" id="mos" onclick="mostrar()" class="submit">Mostrar senha</button><br><br>
                <input type="submit" value="Cadastrar" class="submit" name="submit">

                <div class="links">
                    <p class="destaque">Tem uma conta? <a href="{{ route('login') }}">Conecte-se</a></p>
                </div>
            </div>
        </form>
        <img id="img2" src="../images/petcharm.png" alt="Logo PetCharm">
    </div>

    <script>
        function mostrar() {
            var senha = document.getElementById("password"); 
            var botao = document.getElementById("mos");

            if (senha.type === "password") {
                senha.type = "text";
                botao.innerText = "Ocultar senha"; 
            } else {
                senha.type = "password"; 
                botao.innerText = "Mostrar senha";
            }
        }
    </script>
</body>

</html>