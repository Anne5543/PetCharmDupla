<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        .banner {
            width: 100%;  
            height: auto; 
            display: block;
            margin: 0;
            padding-top: 58px; 
        }

    </style>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="font-sans bg-gray-100">
    <nav x-data="{ open: false, dropdownOpen: false }" class="border-gray-700 fixed w-full top-0 z-50" style="background-color: #7c137b;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
        
                <div class="flex items-center">
                    <div class="shrink-0 flex items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 55px; width: 155px;">
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center relative">
                    <a href="{{ route('login') }}" class="inline-flex items-center px-3 py-2 rounded-md text-white  transition ease-in-out duration-150 no-underline">
                        Entrar
                    </a>
                    <a href="{{ route('register') }}" class="text-white px-3 py-2 rounded-md">Cadastre-se</a>
                </div>         
            
            
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-300 focus:outline-none transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    
        <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
            <div class="border-t border-gray-700 pt-2">
                <a href="{{ route('login') }}" class="block text-white px-3 py-2 ">Entrar</a>
                <a href="{{ route('register') }}" class="text-white px-3 py-2 rounded-md">Cadastre-se</a>
            </div>
        </div>
    </nav>

    <div  id="inicio">
        <img src="{{ asset('images/welcome.png') }}" alt="Banner" class="banner">
    </div>
</html>
