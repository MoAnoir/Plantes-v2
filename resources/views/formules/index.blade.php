<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Formules - PlantMed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="font-sans min-h-screen flex flex-col">
    <x-header></x-header>

    <!-- Main Content -->
    <main class="container mx-auto p-4 sm:p-6 mt-20 max-w-7xl w-full flex-1">
        <section class="text-center mb-10">
            <h1 class="text-3xl sm:text-4xl font-bold text-green-800 mb-3 animate-rotate-in">Liste des Formules</h1>
            <p class="text-gray-600 text-base sm:text-lg animate-fade-in-down" style="animation-delay: 0.2s;">
                Découvrez nos formules médicinales avec un design unique et créatif.
            </p>
        </section>

        @if (session('success'))
            <div class="mb-8 p-3 bg-green-100 text-green-700 rounded-lg shadow-md animate-slide-in-up" style="animation-delay: 0.4s;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Section des filtres -->
        <section class="filter-section animate-fade-in-down">
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                <div>
                    <label for="search-nom"><i class="fas fa-search"></i> Rechercher par nom</label>
                    <input type="text" id="search-nom" placeholder="Ex: Dang Gui" class="w-full">
                </div>
                <div>
                    <label for="filter-alternatif"><i class="fas fa-leaf"></i> Filtrer par nom alternatif</label>
                    <select id="filter-alternatif" class="w-full">
                        <option value="">Tous les noms alternatifs</option>
                        @foreach ($formules->pluck('nom_alternatif')->unique()->filter() as $alternatif)
                            <option value="{{ $alternatif }}">{{ $alternatif }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="filter-plante"><i class="fas fa-seedling"></i> Filtrer par plante (nom latin)</label>
                    <select id="filter-plante" class="w-full">
                        <option value="">Toutes les plantes</option>
                        @foreach ($formules->pluck('plantes')->flatten()->pluck('nom_latin')->unique()->filter() as $nom_latin)
                            <option value="{{ $nom_latin }}">{{ $nom_latin }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="filter-categorie"><i class="fas fa-tag"></i> Filtrer par catégorie</label>
                    <select id="filter-categorie" class="w-full">
                        <option value="">Toutes les catégories</option>
                        @foreach ($formules->pluck('categorie')->unique()->filter() as $categorie)
                            <option value="{{ $categorie }}">{{ $categorie }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-4 flex justify-center">
                <button id="reset-filters" class="reset-btn"><i class="fas fa-undo"></i> Réinitialiser les filtres</button>
            </div>
        </section>

        <!-- Liste des cartes -->
        <section id="formula-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8"></section>

        <!-- Pagination -->
        <div id="pagination" class="pagination"></div>

        <!-- Overlay pour les détails -->
        <div class="overlay" id="formula-detail-overlay">
            <div class="overlay-content">
                <span class="close-btn">×</span>
                <h2 id="formula-name" class="text-center"><i class="fas fa-vial"></i></h2>
                <div id="formula-details" class="mt-3"></div>
            </div>
        </div>
    </main>
    <script>
        window.formulesData = @json($formules);
    </script>
    <script src="{{ asset('js/scripts.js') }}" defer>
       
    </script>
</body>
</html>