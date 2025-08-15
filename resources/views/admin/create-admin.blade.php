<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Créer un administrateur - PlantMed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            opacity: 0.3;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        .input-focus {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(108, 203, 154, 0.2);
            border-color: #6CCB9A;
        }
        
        .floating-label {
            transition: all 0.3s ease;
            transform-origin: left top;
        }
        
        .floating-label.active {
            transform: translateY(-20px) scale(0.8);
            color: #6CCB9A;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #6CCB9A, #5AA87F);
            transition: all 0.3s ease;
            transform: perspective(1000px) rotateX(0deg);
        }
        
        .btn-primary:hover {
            transform: perspective(1000px) rotateX(-5deg) translateY(-3px);
            box-shadow: 0 15px 30px rgba(108, 203, 154, 0.4);
        }
        
        .form-container {
            animation: slideUpFadeIn 0.8s ease-out;
        }
        
        @keyframes slideUpFadeIn {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        .leaf-decoration {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        
        .success-checkmark {
            animation: drawCheck 0.5s ease-in-out;
        }
        
        @keyframes drawCheck {
            0% { stroke-dashoffset: 100; }
            100% { stroke-dashoffset: 0; }
        }
        
        .notification {
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }
        
        .notification.show {
            transform: translateX(0);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-green-50 via-blue-50 to-purple-50 overflow-x-hidden">
    <!-- Particles Background -->
    <div id="particles-js"></div>
    
    <!-- Header -->
    <header class="fixed top-0 w-full bg-green-800 text-white p-6 flex justify-between items-center z-50 shadow-2xl transition-all duration-300 hover:bg-green-900">
        <div class="flex items-center space-x-3 group">
            <img src="{{ asset('storage/images/leaf.png') }}" alt="PlantMed Logo" class="h-8 w-8 mr-2 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-12">
            <a href="{{ route('welcome') }}" class="text-xl font-bold cursor-pointer hover:text-green-300 transition-colors duration-300">PlantMed</a>
        </div>
        <nav>
            @auth
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition-all duration-300">Déconnexion</button>
                </form>
            @endauth
        </nav>
    </header>

    <!-- Floating Leaf Decorations -->
    <div class="leaf-decoration top-20 left-10 text-6xl text-green-300">🌿</div>
    <div class="leaf-decoration top-40 right-20 text-4xl text-green-400" style="animation-delay: 2s;">🍃</div>
    <div class="leaf-decoration bottom-20 left-1/4 text-5xl text-green-200" style="animation-delay: 4s;">🌱</div>

    <!-- Main Content -->
    <main class="min-h-screen flex items-center justify-center pt-24 pb-12 px-4">
        <div class="form-container w-full max-w-2xl">
            <!-- Title Section -->
            <div class="text-center mb-12">
                <h1 class="text-6xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent mb-4 animate__animated animate__fadeInDown">
                    Créer un Administrateur
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-blue-400 mx-auto rounded-full animate__animated animate__fadeInUp"></div>
                <p class="text-gray-600 mt-4 text-lg animate__animated animate__fadeInUp animate__delay-1s">
                    Ajoutez un nouvel administrateur à la plateforme PlantMed
                </p>
            </div>

            <!-- Success/Error Messages -->
            @if (session('success'))
                <div id="successNotification" class="notification fixed top-24 right-4 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50 flex items-center space-x-3">
                    <svg class="w-6 h-6 success-checkmark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" stroke-dasharray="100" stroke-dashoffset="100"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div id="errorNotification" class="notification fixed top-24 right-4 bg-red-500 text-white p-4 rounded-lg shadow-lg z-50">
                    <div class="flex items-center space-x-3 mb-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-semibold">Erreurs détectées:</span>
                    </div>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Card -->
            <div class="glass-card rounded-3xl p-8 shadow-2xl animate__animated animate__zoomIn animate__delay-2s">
                <form id="createAdminForm" action="{{ route('admin.createAdmin') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <!-- Name Field -->
                    <div class="relative group">
                        <input type="text" name="name" id="name" class="input-focus w-full p-4 pt-6 bg-white/70 border-2 border-gray-200 rounded-xl text-gray-800 placeholder-transparent peer" placeholder="Nom complet" required>
                        <label for="name" class="floating-label absolute left-4 top-4 text-gray-600 pointer-events-none peer-placeholder-shown:top-4 peer-placeholder-shown:scale-100 peer-focus:top-2 peer-focus:scale-75 peer-focus:text-green-600">
                            <span class="flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Nom complet</span>
                            </span>
                        </label>
                    </div>

                    <!-- Email Field -->
                    <div class="relative group">
                        <input type="email" name="email" id="email" class="input-focus w-full p-4 pt-6 bg-white/70 border-2 border-gray-200 rounded-xl text-gray-800 placeholder-transparent peer" placeholder="Adresse email" required>
                        <label for="email" class="floating-label absolute left-4 top-4 text-gray-600 pointer-events-none peer-placeholder-shown:top-4 peer-placeholder-shown:scale-100 peer-focus:top-2 peer-focus:scale-75 peer-focus:text-green-600">
                            <span class="flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>Adresse email</span>
                            </span>
                        </label>
                    </div>

                    <!-- Password Field -->
                    <div class="relative group">
                        <input type="password" name="password" id="password" class="input-focus w-full p-4 pt-6 bg-white/70 border-2 border-gray-200 rounded-xl text-gray-800 placeholder-transparent peer" placeholder="Mot de passe" required>
                        <label for="password" class="floating-label absolute left-4 top-4 text-gray-600 pointer-events-none peer-placeholder-shown:top-4 peer-placeholder-shown:scale-100 peer-focus:top-2 peer-focus:scale-75 peer-focus:text-green-600">
                            <span class="flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                <span>Mot de passe</span>
                            </span>
                        </label>
                        <button type="button" id="togglePassword" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-green-600 transition-colors">
                            <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Date Field -->
                    <div class="relative group">
                        <input type="date" name="expires_at" id="expires_at" class="input-focus w-full p-4 pt-6 bg-white/70 border-2 border-gray-200 rounded-xl text-gray-800 peer" required>
                        <label for="expires_at" class="floating-label absolute left-4 top-2 text-green-600 pointer-events-none scale-75">
                            <span class="flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>Date d'expiration</span>
                            </span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center pt-4">
                        <button type="submit" class="btn-primary px-12 py-4 text-white font-semibold rounded-xl shadow-lg text-lg group relative overflow-hidden">
                            <span class="relative z-10 flex items-center space-x-3">
                                <svg class="w-6 h-6 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span>Créer l'administrateur</span>
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </button>
                    </div>
                </form>

                <!-- Back to Dashboard Link -->
                <div class="text-center mt-8">
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center space-x-2 text-gray-600 hover:text-green-600 transition-colors duration-300 group">
                        <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span class="font-medium">Retour au tableau de bord</span>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Initialize particles.js
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: '#6CCB9A' },
                shape: { type: 'circle' },
                opacity: { value: 0.5, random: false },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: '#6CCB9A', opacity: 0.4, width: 1 },
                move: { enable: true, speed: 2, direction: 'none', random: false, straight: false, out_mode: 'out', bounce: false }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' }, resize: true },
                modes: { grab: { distance: 400, line_linked: { opacity: 1 } }, bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 }, repulse: { distance: 200, duration: 0.4 }, push: { particles_nb: 4 }, remove: { particles_nb: 2 } }
            },
            retina_detect: true
        });

        // Show notifications
        document.addEventListener('DOMContentLoaded', function() {
            const successNotification = document.getElementById('successNotification');
            const errorNotification = document.getElementById('errorNotification');
            
            if (successNotification) {
                setTimeout(() => successNotification.classList.add('show'), 100);
                setTimeout(() => successNotification.classList.remove('show'), 4000);
            }
            
            if (errorNotification) {
                setTimeout(() => errorNotification.classList.add('show'), 100);
                setTimeout(() => errorNotification.classList.remove('show'), 6000);
            }
        });

        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L8.464 8.464"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"></path>
                `;
            } else {
                passwordField.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        });

        // Form submission animation
        document.getElementById('createAdminForm').addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = `
                <div class="flex items-center space-x-3">
                    <svg class="animate-spin w-6 h-6" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Création en cours...</span>
                </div>
            `;
            submitBtn.disabled = true;
        });

        // Enhanced input interactions
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
    </script>
</body>
</html>