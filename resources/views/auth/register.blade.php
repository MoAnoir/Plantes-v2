<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - PlantMed</title>
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
            <h1 class="text-3xl sm:text-4xl font-bold text-[#6CCB9A] mb-3 animate-petal-fall">Inscription</h1>
            <p class="text-[#5A5A5A] text-base sm:text-lg animate-fade-in-down" style="animation-delay: 0.2s;">
                Rejoignez PlantMed pour explorer les plantes médicinales.
            </p>
        </section>

        @if ($errors->any())
            <div class="mb-8 p-3 bg-[#FFE7E7] text-[#5A5A5A] rounded-lg shadow-md animate-slide-in-up" style="animation-delay: 0.4s;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="mb-8 p-3 bg-[#E6F9EF] text-[#5A5A5A] rounded-lg shadow-md animate-slide-in-up" style="animation-delay: 0.4s;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulaire d'inscription -->
        <section class="filter-section animate-fade-in-down relative">
            <form method="POST" action="{{ route('register') }}" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block"><i class="fas fa-user animate-float"></i> Nom</label>
                    <input id="name" class="w-full mt-1 p-2 border rounded" type="text" name="name" value="{{ old('name') }}" required autofocus>
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block"><i class="fas fa-envelope animate-float"></i> Email</label>
                    <input id="email" class="w-full mt-1 p-2 border rounded" type="email" name="email" value="{{ old('email') }}" required>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block"><i class="fas fa-lock animate-float"></i> Mot de passe</label>
                    <input id="password" class="w-full mt-1 p-2 border rounded" type="password" name="password" required autocomplete="new-password">
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block"><i class="fas fa-lock animate-float"></i> Confirmer le mot de passe</label>
                    <input id="password_confirmation" class="w-full mt-1 p-2 border rounded" type="password" name="password_confirmation" required>
                </div>

                <!-- Plan Selection -->
                <div>
                    <label for="plan" class="block"><i class="fas fa-star animate-float"></i> Choisir un plan</label>
                    <select name="plan" id="plan" class="w-full mt-1 p-2 border rounded">
                        <option value="free">Gratuit (10 vues/jour)</option>
                        <option value="premiumplan">PremiumPlan (100 vues/jour - Détails sur <a href="https://x.ai/grok" target="_blank" class="text-blue-500">x.ai/grok</a>)</option>
                    </select>
                </div>

                <div class="col-span-2 mt-4 flex justify-center">
                    <button type="submit" class="bg-[#6CCB9A] text-white p-2 rounded animate-pulse-glow">
                        {{ __('S\'inscrire') }}
                    </button>
                </div>
            </form>
        </section>
    </main>

    <script src="{{ asset('js/plantes-scripts.js') }}" defer></script>
</body>
</html>