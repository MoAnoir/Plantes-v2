
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlantMed - La médecine par les plantes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/plantes-styles.css') }}">
</head>
<body class="bg-gray-50">
    <!-- Hero Section -->
    <header class="bg-gradient-to-r from-green-50 to-green-100 min-h-screen">
        <nav class="container mx-auto p-6 flex justify-between items-center">
            <div class="text-2xl font-bold text-green-600">PlantMed</div>
            <div class="space-x-4">
                @auth
                    <a href="{{ route('home') }}" class="text-green-600 hover:text-green-800">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-green-600 hover:text-green-800">Connexion</a>
                @endauth
            </div>
        </nav>

        <div class="container mx-auto px-6 py-20">
            <div class="md:flex items-center">
                <div class="md:w-1/2">
                    <h1 class="text-5xl font-bold text-gray-800 mb-6">
                        Découvrez la puissance des plantes médicinales
                    </h1>
                    <p class="text-xl text-gray-600 mb-8">
                        Accédez à notre base de données complète de plantes médicinales et formules traditionnelles.
                    </p>
                </div>
            </div>
        </div>
    </header>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Nos Formules d'Abonnement</h2>
            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Plan Gratuit -->
                <div class="border rounded-lg p-8 shadow-lg bg-white">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Plan Gratuit</h3>
                    <p class="text-gray-600 mb-6">Pour découvrir</p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            10 recherches par jour
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Accès basique aux plantes
                        </li>
                    </ul>
                    <a href="{{ route('register', ['plan' => 'free']) }}" 
                       class="block text-center bg-gray-100 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-200">
                        Commencer gratuitement
                    </a>
                </div>

                <!-- Plan Premium -->
                <div class="border rounded-lg p-8 shadow-lg bg-green-50 transform hover:scale-105 transition-all">
                    <div class="absolute top-0 right-0 mt-4 mr-4">
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">Populaire</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Plan Premium</h3>
                    <p class="text-gray-600 mb-6">Pour les professionnels</p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Recherches illimitées
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Accès complet à la base de données
                        </li>
                    </ul>
                    <a href="{{ route('register', ['plan' => 'premium']) }}" 
                       class="block text-center bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                        Choisir Premium
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>