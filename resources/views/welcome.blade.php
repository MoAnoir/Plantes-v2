<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur PlantMed</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body class="font-sans bg-green-50 min-h-screen flex flex-col items-center">
    <!-- Loader Overlay -->
    <div class="loader-overlay" id="loader">
        <i class="fas fa-leaf loader-plant animate-sway"></i>
        <div class="loader-text animate-pulse-slow">Chargement...</div>
    </div>
    

    <x-header></x-header>

    <main class="container mx-auto p-4 sm:p-8 mt-20 max-w-6xl w-full flex-1">
        
        <!-- Hero Section -->
        <section class="hero-section text-center py-16 sm:py-24 rounded-2xl shadow-xl mb-12 relative">
            <h1 class="text-4xl sm:text-6xl font-extrabold text-white mb-6 animate-fade-in-down">Bienvenue sur PlantMed</h1>
            <p class="text-lg sm:text-xl text-white opacity-90 mb-8 animate-fade-in-up">
                Votre portail pour explorer les plantes médicinales, formules traditionnelles et syndromes médicaux.
            </p>
            <a href="" class="inline-block bg-white text-green-600 px-8 py-3 rounded-full font-semibold text-lg hover:bg-green-100 transition-all duration-300 animate-pulse-slow">
                Commencer l'exploration
            </a>
        </section>

        <!-- About Section -->
        <section class="about-section text-center mb-12 animate-slide-in">
            <h2 class="text-3xl sm:text-4xl font-bold text-green-800 mb-6">À propos de PlantMed</h2>
            <p class="text-gray-600 text-lg sm:text-xl max-w-3xl mx-auto">
                PlantMed est une plateforme dédiée à la médecine traditionnelle et moderne. Nous offrons une base de données complète pour les amateurs et professionnels, avec des informations détaillées sur les plantes médicinales, les formules thérapeutiques et les syndromes. Explorez, apprenez et découvrez des solutions naturelles pour la santé.
            </p>
        </section>

        

        <!-- Features Section -->
        <section class="features-section mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-green-800 mb-8 text-center animate-slide-in">Fonctionnalités Clés</h2>
            <div class="features-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="feature-card bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 animate-fade-in-up">
                    <i class="fas fa-search text-3xl text-green-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-green-800 mb-2">Recherche Avancée</h3>
                    <p class="text-gray-600">Trouvez rapidement des plantes, formules ou syndromes grâce à notre moteur de recherche intelligent.</p>
                </div>
                <div class="feature-card bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <i class="fas fa-filter text-3xl text-green-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-green-800 mb-2">Filtres Précis</h3>
                    <p class="text-gray-600">Affinez vos recherches avec des filtres par catégorie, organe ou formule associée.</p>
                </div>
                <div class="feature-card bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.4s;">
                    <i class="fas fa-leaf text-3xl text-green-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-green-800 mb-2">Base de Données Riche</h3>
                    <p class="text-gray-600">Accédez à des informations détaillées sur des milliers de plantes et traitements.</p>
                </div>
                <div class="feature-card bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.6s;">
                    <i class="fas fa-book text-3xl text-green-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-green-800 mb-2">Ressources Éducatives</h3>
                    <p class="text-gray-600">Apprenez grâce à des descriptions complètes et des références fiables.</p>
                </div>
            </div>
        </section>

        <!-- Cards Section (Plantes, Formules, Syndromes) -->
        <section class="cards grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 px-4 sm:px-0 mb-12">
            <!-- Plantes -->
            <div class="card bg-blue-50 rounded-2xl p-6 sm:p-8 shadow-lg animate-slide-in-left">
                <div class="card-icon mb-4 sm:mb-6">
                    <i class="fas fa-leaf text-4xl text-blue-600"></i>
                </div>
                <h2 class="card-title text-2xl sm:text-3xl font-bold text-blue-800 mb-4">Plantes</h2>
                <p class="card-text text-gray-600 text-lg sm:text-xl mb-4 sm:mb-6">
                    Explorez une vaste collection de plantes médicinales, leurs propriétés curatives, leurs usages traditionnels et leurs applications modernes.
                </p>
                <a href="{{ route('plantes.index') }}" class="learn-more text-blue-600 hover:text-blue-800 transition-colors duration-300 font-semibold text-base sm:text-lg">En savoir plus →</a>
            </div>
            <!-- Formules -->
            <div class="card bg-green-50 rounded-2xl p-6 sm:p-8 shadow-lg animate-slide-in">
                <div class="card-icon mb-4 sm:mb-6">
                    <i class="fas fa-vial text-4xl text-green-600"></i>
                </div>
                <h2 class="card-title text-2xl sm:text-3xl font-bold text-green-800 mb-4">Formules</h2>
                <p class="card-text text-gray-600 text-lg sm:text-xl mb-4 sm:mb-6">
                    Découvrez des formules médicinales issues de traditions anciennes et validées par la science moderne pour divers traitements.
                </p>
                <a href="{{ route('formules.index') }}" class="learn-more text-green-600 hover:text-green-800 transition-colors duration-300 font-semibold text-base sm:text-lg">En savoir plus →</a>
            </div>
            <!-- Syndromes -->
            <div class="card bg-red-50 rounded-2xl p-6 sm:p-8 shadow-lg animate-slide-in-right">
                <div class="card-icon mb-4 sm:mb-6">
                    <i class="fas fa-heartbeat text-4xl text-red-600"></i>
                </div>
                <h2 class="card-title text-2xl sm:text-3xl font-bold text-red-800 mb-4">Syndromes</h2>
                <p class="card-text text-gray-600 text-lg sm:text-xl mb-4 sm:mb-6">
                    Apprenez-en davantage sur les syndromes médicaux, leurs symptômes et les traitements naturels associés.
                </p>
                <a href="{{ route('syndromes.index') }}" class="learn-more text-red-600 hover:text-red-800 transition-colors duration-300 font-semibold text-base sm:text-lg">En savoir plus →</a>
            </div>
        </section>

        <!-- Nouvelle Section Indépendante : Catégories de Syndromes selon la Langue -->
        
        <section class="categories-section mb-12">
            <div class="text-center mb-8">
                <i class="fas fa-tongue text-5xl text-purple-600 mb-4 animate-pulse-slow"></i>
                <h2 class="text-3xl sm:text-4xl font-bold text-purple-800 mb-4 animate-slide-in">Catégories de Syndromes selon la Langue</h2>
                <p class="text-gray-600 text-lg sm:text-xl max-w-3xl mx-auto animate-fade-in-up">
                    Découvrez votre catégorie selon votre langue et explorez les syndromes associés pour mieux comprendre leurs symptômes et traitements.
                </p>
            </div>
            <div class="categories-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $sortedCategories = $allSyndromes->pluck('categorie')->unique()->filter()->sortBy(function ($category) {
                        return strtolower($category); // Trie par ordre alphabétique insensible à la casse
                    });
                @endphp
                @forelse($sortedCategories as $index => $categorie)
                    <a href="{{ route('langues.index') }}?categorie={{ urlencode($categorie) }}" class="category-card bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 animate-fade-in-up" style="animation-delay: {{ $index * 0.2 }}s;">
                        <h3 class="text-xl font-semibold text-purple-800 mb-2">{{ $categorie }}</h3>
                        <p class="text-gray-600">Cliquez pour voir l'image de la langue et les syndromes de cette catégorie.</p>
                    </a>
                @empty
                    <div class="text-center col-span-full p-6 text-gray-500">
                        Aucune catégorie disponible pour le moment.
                    </div>
                @endforelse
            </div>
        </section>
    </main>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Injecter les données dynamiques pour welcome.js -->
    <script>
        window.syndromesData = @json($allSyndromes->pluck('nom_syndrome'));
        window.categoriesData = @json($allSyndromes->pluck('categorie')->unique()->filter());
        window.organesAssociesData = @json($allSyndromes->pluck('organe_associe')->unique()->filter());
        window.formulesData = @json(\App\Models\Formule::all()->pluck('nom'));
    </script>

    <!-- Custom JavaScript -->
    <script src="{{ asset('js/welcome.js') }}"></script>
</body>
</html>