<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur PlantMed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/presentation.css') }}">
</head>
<body class="font-sans min-h-screen flex flex-col relative overflow-x-hidden bg-gradient-to-b from-[#E6F9EF] to-[#FFFFFF]">
    <div class="floating-elements">
        <div class="leaf leaf-1"></div>
        <div class="leaf leaf-2"></div>
        <div class="leaf leaf-3"></div>
        <div class="petal petal-1"></div>
        <div class="petal petal-2"></div>
    </div>

    <x-header></x-header>

    <main class="container mx-auto p-4 sm:p-6 mt-20 max-w-7xl w-full flex-1 relative z-10 flex items-center justify-center">
        <div class="text-center presentation-content animate-fade-in">
            <h1 class="text-4xl sm:text-5xl font-bold text-[#6CCB9A] mb-4 glow-text">Découvrez PlantMed</h1>
            <p class="text-[#5A5A5A] text-lg sm:text-xl mb-6 max-w-2xl mx-auto">
                Plongez dans l'univers des plantes médicinales avec notre logiciel innovant. Abonnez-vous pour accéder à une expérience enrichissante !
            </p>
            <button id="toggleAction" class="bg-[#6CCB9A] text-white px-6 py-3 rounded-full text-lg font-semibold hover:bg-[#5AA87F] transition-all duration-300 animate-pulse-slow">
                S'abonner
            </button>
            <p id="switchOption" class="mt-4 text-[#5A5A5A] cursor-pointer hover:text-[#6CCB9A] transition-colors duration-300">
                Déjà inscrit ? <span class="underline">Connectez-vous</span>
            </p>

            <div id="formContainer" class="mt-6 hidden">
                <div id="registerForm" class="form-panel">
                    <h2 class="text-2xl font-bold text-[#6CCB9A] mb-4">Devenez membre</h2>
                    <form method="POST" action="{{ route('register') }}" class="grid grid-cols-1 gap-4">
                        @csrf
                        <div>
                            <label for="name" class="block text-[#5A5A5A]"><i class="fas fa-user animate-float-slow"></i> Nom</label>
                            <input id="name" class="w-full mt-1 p-2 border rounded-lg bg-white" type="text" name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                        <div>
                            <label for="email" class="block text-[#5A5A5A]"><i class="fas fa-envelope animate-float-slow"></i> Email</label>
                            <input id="email" class="w-full mt-1 p-2 border rounded-lg bg-white" type="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div>
                            <label for="password" class="block text-[#5A5A5A]"><i class="fas fa-lock animate-float-slow"></i> Mot de passe</label>
                            <input id="password" class="w-full mt-1 p-2 border rounded-lg bg-white" type="password" name="password" required autocomplete="new-password">
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-[#5A5A5A]"><i class="fas fa-lock animate-float-slow"></i> Confirmer le mot de passe</label>
                            <input id="password_confirmation" class="w-full mt-1 p-2 border rounded-lg bg-white" type="password" name="password_confirmation" required>
                        </div>
                        <div class="mt-4 flex justify-center">
                            <button type="submit" class="bg-[#6CCB9A] text-white px-4 py-2 rounded-full hover:bg-[#5AA87F] transition-all duration-300">
                                S'abonner
                            </button>
                        </div>
                    </form>
                    <p class="mt-4 text-center text-[#5A5A5A]">Après inscription, effectuez le paiement pour activer votre compte.</p>
                </div>
                <div id="loginForm" class="form-panel hidden">
                    <h2 class="text-2xl font-bold text-[#6CCB9A] mb-4">Connexion</h2>
                    <form method="POST" action="{{ route('login') }}" class="grid grid-cols-1 gap-4">
                        @csrf
                        <div>
                            <label for="email_login" class="block text-[#5A5A5A]"><i class="fas fa-envelope animate-float-slow"></i> Email</label>
                            <input id="email_login" class="w-full mt-1 p-2 border rounded-lg bg-white" type="email" name="email" required>
                        </div>
                        <div>
                            <label for="password_login" class="block text-[#5A5A5A]"><i class="fas fa-lock animate-float-slow"></i> Mot de passe</label>
                            <input id="password_login" class="w-full mt-1 p-2 border rounded-lg bg-white" type="password" name="password" required>
                        </div>
                        <div class="mt-4 flex justify-center">
                            <button type="submit" class="bg-[#6CCB9A] text-white px-4 py-2 rounded-full hover:bg-[#5AA87F] transition-all duration-300">
                                Se connecter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/presentation.js') }}" defer></script>
</script>