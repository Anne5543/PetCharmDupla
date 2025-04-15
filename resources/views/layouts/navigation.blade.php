<nav x-data="{ open: false, dropdownOpen: false }" class="border-gray-700 fixed w-full top-0 z-50" style="background-color: #7c137b;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 55px; width: 155px;">
                </div>
            </div>

        
            <div class="hidden sm:flex sm:items-center sm:ms-auto">
                <div class="space-x-8">
                    <a href="#inicio" class="text-white no-underline hover:text-gray-300">Início</a>
                    <a href="#sobre" class="text-white no-underline hover:text-gray-300">Sobre</a>
                    <a href="#serviços" class="text-white no-underline hover:text-gray-300">Serviços</a>
                    <a href="#agendamentos" class="text-white no-underline hover:text-gray-300">Agendamentos</a>
                    <a href="#contatos" class="text-white no-underline hover:text-gray-300">Feedback</a>
                    <a href="{{ route('animais.index') }}" class="text-white no-underline hover:text-gray-300">Meus Pets</a>
                </div>

            </div>

        
            <div class="hidden sm:flex sm:items-center relative">
                @if (Auth::check())
                <button @click="dropdownOpen = !dropdownOpen" class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-white hover:bg-gray-700 focus:outline-none transition ease-in-out duration-150" style="background-color: #7c137b;">
                    <div>{{ Auth::user()->name }}</div>
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                </button>
        
                <div x-show="dropdownOpen" x-transition class="absolute top-full w-48 bg-white shadow-lg rounded-md">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-black no-underline">Perfil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block px-4 py-2 text-black no-underline">Sair</button>
                    </form>
                </div>

                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none transition ease-in-out duration-150 no-underline">
                        {{ __('Login') }}
                    </a>
                @endif
            </div>         
            
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-300 focus:outline-none focus:text-gray-300 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="#inicio" class="block px-4 py-2 text-white hover:bg-gray-700 no-underline">Início</a>
            <a href="#sobre" class="block px-4 py-2 text-white hover:bg-gray-700 no-underline">Sobre</a>
            <a href="#servicos" class="block px-4 py-2 text-white hover:bg-gray-700 no-underline">Serviços</a>
            <a href="#agendamentos" class="block px-4 py-2 text-white hover:bg-gray-700 no-underline">Agendamentos</a>
            <a href="#agendamentos" class="block px-4 py-2 text-white hover:bg-gray-700 no-underline">Feedback</a>
            <a href="Feedback" class="block px-4 py-2 text-white hover:bg-gray-700 no-underline">Agendamentos</a>
            <a href="{{ route('animais.index') }}" class="text-white no-underline hover:text-gray-300">Meus Pets</a>
        </div>

  
        <div class="border-t" style="color: white;">
    <div class="mt-3">
        @if (Auth::check())
            <x-responsive-nav-link :href="route('profile.edit')" class="text-white no-underline block px-4 py-2" style="color: white;">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();" class="text-white no-underline block px-4 py-2" style="color: white;">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        @else
            <x-responsive-nav-link :href="route('login')" class="text-white no-underline" style="color: white;">
                {{ __('Login') }}
            </x-responsive-nav-link>
        @endif
    </div>
</div>

    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>




    


    