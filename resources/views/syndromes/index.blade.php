<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Syndromes - PlantMed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/syndromes-styles.css') }}">
    <style>
        /* Ajuster la taille des cartes */
        .syndrome-card {
            padding: 1rem; /* Réduire le padding */
            margin-bottom: 1rem; /* Réduire la marge */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .syndrome-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }
        .syndrome-card h3 {
            font-size: 1.125rem; /* Réduire la taille de la police du titre */
            margin-bottom: 0.5rem;
        }
        .syndrome-card p {
            font-size: 0.875rem; /* Réduire la taille de la police des paragraphes */
            margin-bottom: 0.25rem;
        }
        .syndrome-card .detail-link {
            font-size: 0.75rem; /* Réduire la taille du lien "Détails" */
        }
        .syndrome-card .formule-badge {
            font-size: 0.75rem; /* Réduire la taille des badges de formules */
        }
    </style>
</head>
<body class="font-sans min-h-screen flex flex-col">
    <x-header></x-header>
    <!-- Main Content -->
    <main class="container mx-auto p-4 sm:p-6 mt-20 max-w-7xl w-full flex-1">
        <section class="text-center mb-10">
            <h1 class="text-3xl sm:text-4xl font-bold text-teal-800 mb-3 animate-rotate-in">Liste des Syndromes</h1>
            <p class="text-gray-600 text-base sm:text-lg animate-fade-in-down" style="animation-delay: 0.2s;">
                Explorez les syndromes médicaux et leurs formules associées.
            </p>
        </section>

        @if (session('success'))
            <div class="mb-8 p-3 bg-teal-100 text-teal-700 rounded-lg shadow-md animate-slide-in-up" style="animation-delay: 0.4s;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Section des filtres -->
        <section class="filter-section animate-fade-in-down">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="search-nom-syndrome"><i class="fas fa-search"></i> Rechercher par nom</label>
                    <input type="text" id="search-nom-syndrome" placeholder="Ex: Stagnation de Qi" class="w-full">
                </div>
                <div>
                    <label for="filter-categorie"><i class="fas fa-tag"></i> Catégorie</label>
                    <select id="filter-categorie" class="w-full">
                        <option value="">Toutes</option>
                        @foreach($syndromes->pluck('categorie')->unique()->filter() as $categorie)
                            <option value="{{ $categorie }}">{{ $categorie }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="filter-organe-associe"><i class="fas fa-heart"></i> Organe Associé</label>
                    <select id="filter-organe-associe" class="w-full">
                        <option value="">Tous</option>
                        @foreach($syndromes->pluck('organe_associe')->unique()->filter() as $organe)
                            <option value="{{ $organe }}">{{ $organe }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="filter-formule"><i class="fas fa-vial"></i> Formule Associée</label>
                    <select id="filter-formule" class="w-full">
                        <option value="">Toutes</option>
                        @foreach(\App\Models\Formule::all() as $formule)
                            <option value="{{ $formule->nom }}">{{ $formule->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-4 flex justify-center">
                <button id="reset-filters-syndromes" class="reset-btn"><i class="fas fa-undo"></i> Réinitialiser les filtres</button>
            </div>
        </section>

        <!-- Liste des cartes -->
        <section id="syndrome-grid" class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-4 sm:gap-6"></section>

        <!-- Pagination -->
        <div id="pagination-syndromes" class="pagination"></div>

        <!-- Popup pour les détails -->
        <div class="popup" id="syndrome-detail-popup">
            <div class="popup-content">
                <span class="close-btn">×</span>
                <h2 id="syndromeName"></h2>
                <div id="syndromeDetails"></div>
            </div>
        </div>
    </main>

    <!-- Injecter les données et les routes dans une variable globale -->
    <script>
        window.syndromesData = @json($syndromes);
        window.routes = {
            formuleShowById: (id) => '{{ route("formules.showById", ":id") }}'.replace(':id', id)
        };
    </script>
    <script src="{{ asset('js/syndromes-scripts.js') }}" defer></script>
</body>
</html>