<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Langue et Syndromes - PlantMed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body class="font-sans bg-green-50 min-h-screen flex flex-col items-center">
    <x-header></x-header>

    <main class="container mx-auto p-4 sm:p-8 mt-20 max-w-6xl w-full flex-1">
        <!-- Navigation par catégories -->
        <div class="mb-8 text-center">
            <label for="categorySelect" class="block text-lg font-semibold text-green-800 mb-2">Choisir une catégorie :</label>
            <select 
                id="categorySelect" 
                onchange="window.location.href='{{ route('langues.index') }}?categorie=' + encodeURIComponent(this.value)" 
                class="w-full max-w-md p-3 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300 text-sm"
            >
                <option value="">Sélectionner une catégorie</option>
                @foreach($allCategories as $category)
                    <option value="{{ $category }}" {{ $selectedCategory == $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Affichage de l'image de la langue et catégorie sélectionnée -->
        @if($selectedCategory && $langue)
            <div class="text-center mb-12 animate-fade-in-up">
                <h2 class="text-3xl sm:text-4xl font-bold text-green-800 mb-6">Catégorie : {{ $selectedCategory }}</h2>
                <img src="{{ asset($langue->image) }}" alt="Langue pour {{ $selectedCategory }}" class="mx-auto w-96 h-96 object-contain shadow-lg">
            </div>
        @elseif($selectedCategory)
            <div class="text-center mb-12 animate-fade-in-up">
                <h2 class="text-3xl sm:text-4xl font-bold text-green-800 mb-6">Catégorie : {{ $selectedCategory }}</h2>
                <p class="text-gray-600 text-lg">Aucune image disponible pour cette catégorie.</p>
            </div>
        @else
            <div class="text-center mb-12 animate-fade-in-up">
                <p class="text-gray-600 text-lg">Veuillez sélectionner une catégorie pour voir l'image de la langue et les syndromes associés.</p>
            </div>
        @endif

        <!-- Liste des syndromes -->
        @if($selectedCategory)
            <section class="syndrome-results mb-12 bg-white p-6 sm:p-8 rounded-2xl shadow-lg animate-fade-in-up">
                <h2 class="text-2xl sm:text-3xl font-bold text-green-800 mb-6 text-center">Syndromes Associés</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($syndromes as $syndrome)
                        <div class="bg-white p-4 rounded-lg shadow-md border border-green-200 hover:bg-green-50 transition-all duration-300">
                            <h3 class="text-xl font-semibold text-green-700 mb-2">{{ $syndrome->nom_syndrome }}</h3>
                            <p class="text-gray-600 text-sm"><strong>Catégorie :</strong> {{ $syndrome->categorie }}</p>
                            <p class="text-gray-600 text-sm"><strong>Organe :</strong> {{ $syndrome->organe_associe ?? 'Aucun' }}</p>
                            <p class="text-gray-600 text-sm"><strong>Formules :</strong> {{ $syndrome->formules->pluck('nom')->join(', ') ?: 'Aucune' }}</p>
                        </div>
                    @empty
                        <p class="text-center col-span-full text-gray-500 text-lg">Aucun syndrome trouvé pour cette catégorie.</p>
                    @endforelse
                </div>
            </section>
        @endif
    </main>

    <footer class="w-full bg-green-600 text-white p-4 text-center">
        <p>© 2025 PlantMed</p>
    </footer>
</body>
</html>