<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Plantes - PlantMed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/plantes-styles.css') }}">
</head>
<body class="font-sans min-h-screen flex flex-col relative overflow-x-hidden">
    <!-- Pétales flottants en arrière-plan -->
    <div class="petals-background">
        <div class="petal petal-1"></div>
        <div class="petal petal-2"></div>
        <div class="petal petal-3"></div>
        <div class="petal petal-4"></div>
        <div class="petal petal-5"></div>
    </div>

    <x-header></x-header>

    <!-- Main Content -->
    <main class="container mx-auto p-4 sm:p-6 mt-20 max-w-7xl w-full flex-1 relative z-10">
        <section class="text-center mb-10">
            <h1 class="text-3xl sm:text-4xl font-bold text-[#6CCB9A] mb-3 animate-petal-fall">Liste des Plantes</h1>
            <p class="text-[#5A5A5A] text-base sm:text-lg animate-fade-in-down" style="animation-delay: 0.2s;">
                Explorez les plantes médicinales dans une ambiance printanière et magique.
            </p>
        </section>

        @if (session('success'))
            <div class="mb-8 p-3 bg-[#E6F9EF] text-[#5A5A5A] rounded-lg shadow-md animate-slide-in-up" style="animation-delay: 0.4s;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Section des filtres -->
        <section class="filter-section animate-fade-in-down relative">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="search-nom-latin"><i class="fas fa-search animate-float"></i> Rechercher par nom latin</label>
                    <input type="text" id="search-nom-latin" placeholder="Ex: Angelica sinensis" class="w-full">
                </div>
                <div>
                    <label for="search-nom-chinois"><i class="fas fa-leaf animate-float"></i> Rechercher par nom chinois</label>
                    <input type="text" id="search-nom-chinois" placeholder="Ex: Dang Gui" class="w-full">
                </div>
                <div>
                    <label for="filter-partie-utilisee"><i class="fas fa-leaf animate-float"></i> Partie Utilisée</label>
                    <select id="filter-partie-utilisee" class="w-full">
                        <option value="">Toutes</option>
                        <option value="racine">Racine</option>
                        <option value="feuille">Feuille</option>
                        <option value="fleur">Fleur</option>
                        <option value="écorce">Écorce</option>
                        <option value="graine">Graine</option>
                    </select>
                </div>
                <div>
                    <label for="filter-formule"><i class="fas fa-vial animate-float"></i> Formule Associée</label>
                    <select id="filter-formule" class="w-full">
                        <option value="">Toutes</option>
                        @foreach(\App\Models\Formule::all() as $formule)
                            <option value="{{ $formule->nom }}">{{ $formule->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-4 flex justify-center">
                <button id="reset-filters-plantes" class="reset-btn animate-pulse-glow"><i class="fas fa-undo animate-float"></i> Réinitialiser les filtres</button>
            </div>
        </section>

        <!-- Liste des cartes -->
        <section id="plante-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8"></section>

        <!-- Pagination -->
        <div id="pagination-plantes" class="pagination"></div>

        <!-- Overlay pour les détails -->
        <div class="overlay" id="plante-detail-overlay">
            <div class="overlay-content animate-bloom">
                <span class="close-btn animate-float">×</span>
                <div id="plantImage" class="flex justify-center"></div>
                <h2 id="plantName"><i class="fas fa-seedling animate-float"></i></h2>
                <div id="plantDetails"></div>
            </div>
        </div>
    </main>

    <!-- Injecter les données dans une variable globale -->
    <script>
        window.plantesData = @json($plantes);
    </script>
    <script src="{{ asset('js/plantes-scripts.js') }}" defer></script>
</body>
</html>