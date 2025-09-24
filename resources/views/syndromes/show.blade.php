<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $syndrome->nom_syndrome }} - PlantMed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/syndromes-styles.css') }}">
</head>
<body class="font-sans min-h-screen flex flex-col">
    <!-- Header -->
    <x-header></x-header>

    <!-- Main Content -->
    <main class="container mx-auto p-4 sm:p-6 mt-16 sm:mt-20 max-w-6xl w-full flex-1">
    <section class="text-center mb-8 lg:mb-10">
        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-teal-800 mb-3 animate-rotate-in">
            <i class="fas fa-diagnoses mr-2"></i> {{ $syndrome->nom_syndrome }}
        </h1>
        <p class="text-gray-600 text-sm sm:text-base lg:text-lg animate-fade-in-down" style="animation-delay: 0.2s;">
            Détails du syndrome et formules associées
        </p>
    </section>

    <!-- Détails du Syndrome -->
    <section class="bg-white rounded-lg shadow-lg p-4 sm:p-6 lg:p-8 animate-bounce-in">
        @if($syndrome->description)
            <div class="mb-6 animate-slide-in-up" style="animation-delay: 0.3s;">
                <h2 class="text-lg sm:text-xl font-semibold text-teal-700 mb-2 flex flex-col sm:flex-row items-start sm:items-center">
                    <i class="fas fa-file-alt mr-0 sm:mr-2 mb-1 sm:mb-0"></i> 
                    <span>Description</span>
                </h2>
                <p class="text-gray-700 leading-relaxed text-sm sm:text-base">{{ $syndrome->description }}</p>
            </div>
        @endif

        @if($syndrome->categorie)
            <div class="mb-6 animate-slide-in-up" style="animation-delay: 0.4s;">
                <h2 class="text-lg sm:text-xl font-semibold text-teal-700 mb-2 flex flex-col sm:flex-row items-start sm:items-center">
                    <i class="fas fa-tag mr-0 sm:mr-2 mb-1 sm:mb-0"></i> 
                    <span>Catégorie</span>
                </h2>
                <p class="text-gray-700 text-sm sm:text-base">{{ $syndrome->categorie }}</p>
            </div>
        @endif

        @if($syndrome->organe_associe)
            <div class="mb-6 animate-slide-in-up" style="animation-delay: 0.5s;">
                <h2 class="text-lg sm:text-xl font-semibold text-teal-700 mb-2 flex flex-col sm:flex-row items-start sm:items-center">
                    <i class="fas fa-heart mr-0 sm:mr-2 mb-1 sm:mb-0"></i> 
                    <span>Organe Associé</span>
                </h2>
                <p class="text-gray-700 text-sm sm:text-base">{{ $syndrome->organe_associe }}</p>
            </div>
        @endif

        <div class="mb-6 animate-slide-in-up" style="animation-delay: 0.6s;">
            <h2 class="text-lg sm:text-xl font-semibold text-teal-700 mb-4 flex flex-col sm:flex-row items-start sm:items-center">
                <i class="fas fa-vial mr-0 sm:mr-2 mb-1 sm:mb-0"></i> 
                <span>Formules Associées</span>
            </h2>
            @if($syndrome->formules && $syndrome->formules->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 sm:gap-3">
                    @foreach($syndrome->formules as $formule)
                        <a href="{{ route('formules.show', $formule->id) }}" 
                           class="block text-blue-500 hover:text-blue-700 bg-teal-100 hover:bg-teal-200 px-3 py-2 rounded-lg transition-all duration-300 text-sm sm:text-base text-center">
                            <i class="fas fa-vial mr-1"></i>
                            {{ $formule->nom }}
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-flask text-gray-400 text-3xl sm:text-4xl mb-2"></i>
                    <p class="text-gray-500 italic text-sm sm:text-base">Aucune formule associée à ce syndrome.</p>
                </div>
            @endif
        </div>

        <!-- Bouton Retour -->
        <div class="text-center mt-8 animate-fade-in-down" style="animation-delay: 0.7s;">
            <a href="{{ route('syndromes.index') }}" 
               class="inline-block bg-teal-600 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-full font-semibold hover:bg-teal-700 transition-all duration-300 text-sm sm:text-base">
                <i class="fas fa-arrow-left mr-2"></i> 
                Retour à la liste
            </a>
        </div>
    </section>
</main>
</body>
</html>