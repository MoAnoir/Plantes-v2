<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - PlantMed</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="bg-gray-100 font-sans flex flex-col min-h-screen">
    <!-- Header Section -->
    <x-header></x-header>

    <!-- Main Content -->
    <main class="container mx-auto p-4 sm:p-6 mt-20 max-w-7xl w-full flex-1">
        <section class="text-center mb-10">
            <h1 class="text-3xl sm:text-4xl font-bold text-red-800 mb-3 animate-fade-in-down">
                <i class="fas fa-exclamation-triangle text-red-600 mr-2"></i>Erreur 404
            </h1>
            <p class="text-gray-600 text-base sm:text-lg animate-fade-in-down" style="animation-delay: 0.2s;">
                <i class="fas fa-search-minus text-gray-500 mr-2"></i>La page que vous recherchez n'existe pas.
            </p>
        </section>

        @if (session('success'))
            <div class="mb-8 p-3 bg-green-100 text-green-700 rounded-lg shadow-md animate-slide-in-up" style="animation-delay: 0.4s;">
                <i class="fas fa-check-circle text-green-600 mr-2"></i>{{ session('success') }}
            </div>
        @endif
    </main>

{{--  --}}

</body>