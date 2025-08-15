<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Images des Langues - PlantMed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body class="font-sans bg-green-50 min-h-screen flex flex-col items-center">
    <x-header></x-header>

    <main class="container mx-auto p-4 sm:p-8 mt-20 max-w-6xl w-full flex-1">
        <!-- Titre de la page -->
        <section class="text-center mb-10">
            <h1 class="text-3xl sm:text-4xl font-bold text-teal-800 mb-3 animate-fade-in-down">Gérer les Images des Langues</h1>
            <p class="text-gray-600 text-base sm:text-lg animate-fade-in-down" style="animation-delay: 0.2s;">
                Ajoutez ou modifiez les images associées à chaque catégorie de langue.
            </p>
        </section>

        <!-- Messages de succès ou d'erreur -->
        @if (session('success'))
            <div class="mb-8 p-3 bg-teal-100 text-teal-700 rounded-lg shadow-md animate-slide-in-up">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-8 p-3 bg-red-100 text-red-700 rounded-lg shadow-md animate-slide-in-up">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Liste des catégories avec formulaire pour ajouter/modifier l'image -->
        <section class="categories-list bg-white p-6 sm:p-8 rounded-2xl shadow-lg animate-fade-in-up">
            <h2 class="text-2xl sm:text-3xl font-bold text-green-800 mb-6 text-center">Catégories et Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($langues as $langue)
                    <div class="bg-white p-4 rounded-lg shadow-md border border-green-200 hover:bg-green-50 transition-all duration-300">
                        <h3 class="text-xl font-semibold text-green-700 mb-2">{{ $langue->categorie }}</h3>
                        <!-- Affichage de l'image actuelle -->
                        @if($langue->image)
                            <div class="mb-4 text-center">
                                <img src="{{ asset($langue->image) }}" alt="Langue pour {{ $langue->categorie }}" class="mx-auto w-32 h-32 object-cover rounded-full shadow-lg">
                                <p class="text-gray-600 text-sm mt-2">Image actuelle</p>
                            </div>
                        @else
                            <div class="mb-4 text-center">
                                <p class="text-gray-600 text-sm">Aucune image disponible</p>
                            </div>
                        @endif
                        <!-- Formulaire pour uploader une nouvelle image -->
                        <form action="{{ route('langues.updateImage', $langue->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
                            @csrf
                            @method('PATCH')
                            <label for="image-{{ $langue->id }}" class="block text-sm font-medium text-gray-700 mb-2">Nouvelle image :</label>
                            <input 
                                type="file" 
                                id="image-{{ $langue->id }}" 
                                name="image" 
                                accept="image/*" 
                                class="w-full p-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300 text-sm"
                            >
                            <button 
                                type="submit" 
                                class="mt-4 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-all duration-300 shadow-md hover:shadow-lg text-sm"
                            >
                                Mettre à jour l'image
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-center col-span-full text-gray-500 text-lg">Aucune catégorie trouvée.</p>
                @endforelse
            </div>
        </section>
    </main>

    <footer class="w-full bg-green-600 text-white p-4 text-center">
        <p>© 2025 PlantMed</p>
    </footer>
</body>
</html>