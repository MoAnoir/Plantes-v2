<header class="fixed top-0 w-full bg-green-800 text-white p-6 flex justify-between items-center z-50 shadow-2xl transition-all duration-300 hover:bg-green-900">
    <div class="flex items-center space-x-3 group">
        
        <img src="{{ asset('storage/images/leaf.png') }}" alt="PlantMed Logo" class="h-8 w-8 mr-2 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-12">
        <a href="{{ route('welcome') }}" class="text-xl font-bold cursor-pointer hover:text-green-300 transition-colors duration-300">PlantMed</a>
    </div>
    {{-- <a href="{{ route('admin.dashboard') }}" class="text-base font-medium bg-green-700 px-4 py-2 rounded-full shadow-md hover:bg-green-600 transition-all duration-300 animate-pulse-slow">
        Administration
    </a> --}}
    <nav>
            @auth
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Déconnexion</button>
                </form>
            {{-- @else
                <a href="{{ route('login') }}" class="text-white hover:underline mr-4">Connexion</a>
                <a href="{{ route('register') }}" class="text-white hover:underline">Inscription</a> --}}
            @endauth
        </nav>
</header>