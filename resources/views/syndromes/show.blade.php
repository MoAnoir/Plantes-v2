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
    <main class="container mx-auto p-4 sm:p-6 mt-20 max-w-4xl w-full flex-1">
        <section class="text-center mb-10">
            <h1 class="text-3xl sm:text-4xl font-bold text-teal-800 mb-3 animate-rotate-in">
                <i class="fas fa-diagnoses mr-2"></i> {{ $syndrome->nom_syndrome }}
            </h1>
            <p class="text-gray-600 text-base sm:text-lg animate-fade-in-down" style="animation-delay: 0.2s;">
                Détails du syndrome et formules associées
            </p>
        </section>

        <!-- Détails du Syndrome -->
        <section class="bg-white rounded-lg shadow-lg p-6 sm:p-8 animate-bounce-in">
            @if($syndrome->description)
                <div class="mb-6 animate-slide-in-up" style="animation-delay: 0.3s;">
                    <h2 class="text-xl font-semibold text-teal-700 mb-2 flex items-center">
                        <i class="fas fa-file-alt mr-2"></i> Description
                    </h2>
                    <p class="text-gray-700 leading-relaxed">{{ $syndrome->description }}</p>
                </div>
            @endif

            @if($syndrome->categorie)
                <div class="mb-6 animate-slide-in-up" style="animation-delay: 0.4s;">
                    <h2 class="text-xl font-semibold text-teal-700 mb-2 flex items-center">
                        <i class="fas fa-tag mr-2"></i> Catégorie
                    </h2>
                    <p class="text-gray-700">{{ $syndrome->categorie }}</p>
                </div>
            @endif

            @if($syndrome->organe_associe)
                <div class="mb-6 animate-slide-in-up" style="animation-delay: 0.5s;">
                    <h2 class="text-xl font-semibold text-teal-700 mb-2 flex items-center">
                        <i class="fas fa-heart mr-2"></i> Organe Associé
                    </h2>
                    <p class="text-gray-700">{{ $syndrome->organe_associe }}</p>
                </div>
            @endif

            <div class="mb-6 animate-slide-in-up" style="animation-delay: 0.6s;">
                <h2 class="text-xl font-semibold text-teal-700 mb-2 flex items-center">
                    <i class="fas fa-vial mr-2"></i> Formules Associées
                </h2>
                @if($syndrome->formules && $syndrome->formules->count() > 0)
                    <div class="flex flex-wrap gap-2">
                        @foreach($syndrome->formules as $formule)
                            <a href="{{ route('formules.show', $formule->id) }}" class="text-blue-500 hover:underline bg-teal-100 px-3 py-1 rounded-full transition-all duration-300 hover:bg-teal-200">
                                {{ $formule->nom }}
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 italic">Aucune formule associée à ce syndrome.</p>
                @endif
            </div>

            <!-- Bouton Retour -->
            <div class="text-center mt-8 animate-fade-in-down" style="animation-delay: 0.7s;">
                <a href="{{ route('syndromes.index') }}" class="inline-block bg-teal-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-teal-700 transition-all duration-300">
                    <i class="fas fa-arrow-left mr-2"></i> Retour à la liste
                </a>
            </div>
        </section>
    </main>
</body>
</html>