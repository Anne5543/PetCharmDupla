<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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

        .nav_icon {
            font-size: 1.25rem;
        }


        .dropdown {
            position: relative;
        }

        .dropdown_toggle {
            background: none;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .dropdown_menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            padding: 10px;
            border-radius: 5px;
            list-style: none;
            z-index: 1000;
            width: 170px;
        }

        .dropdown_menu li {
            padding: 5px 10px;
        }

        .dropdown_menu li a,
        .dropdown_menu li button {
            color: black;
            background-color: white;
            border: none;
            font-size: 16px;
            width: 100%;
            text-align: left;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            text-decoration: none;

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
            .table-responsive-sm {
                overflow-x: auto;
            }
            .table td,
            .table th {
                padding: 0.3rem;
            }
            .footer-table-container {
                width: 100%;
                height: auto;
            }

            .table-container {
                overflow-x: auto;
            }

        }
    </style>
</head>

<body>
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bi bi-list' id="header-toggle"></i>
            <img src="{{ asset('images/logo.png') }}" id="logo" alt="logo" class="nav-logo" style="height: 60px; width:160px;">

            @if (Auth::check())
            <div class="nav_link dropdown" style="margin-left: 420%; margin-bottom: -5px;">
                <button class="dropdown_toggle" id="userDropdown">
                    <span class="nav_name">{{ Auth::user()->name }}</span>
                    <i class='bi bi-chevron-down'></i>
                </button>
                <ul class="dropdown_menu" id="dropdownMenu">
                    <li><a href="{{ route('profile.edit') }}" class="hover:text-gray-300">Perfil</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="hover:text-gray-300">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <a href="{{ route('login') }}" class="nav_link">
                <span class="nav_name">Login</span>
            </a>
            @endif
        </div>
    </header>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdownToggle = document.getElementById('userDropdown');
            const dropdownMenu = document.getElementById('dropdownMenu');

            dropdownToggle.addEventListener('click', function(event) {
                event.stopPropagation();
                dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
            });

            document.addEventListener('click', function(event) {
                if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.style.display = 'none';
                }
            });
        });
    </script>



    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div style="margin-top: 65px;">
                <div class="nav_list">
                    <a href="{{ route('tela_admin') }}" class="nav_link">
                        <span class="nav_name">Início</span>
                    </a>
                    <a href="{{route('funcionarios_admin')}}" class="nav_link">
                        <span class="nav_name">Funcionarios</span>
                    </a>
                    <a href="{{ route('agendamentos.admin') }}" class="nav_link">
                        <span class="nav_name">Agendamentos</span>
                    </a>

                    <a href="{{route('feedbacks_admin')}}" class="nav_link">
                        <span class="nav_name">Feedback</span>
                    </a>
                </div>
            </div>
        </nav>

    </div>



</body>

</html>