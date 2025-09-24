<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de {{ $formule->nom }} - PlantMed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Animations personnalisées (identiques à celles de plantes/show) */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(50px) scale(0.9); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes rotateIn {
            from { opacity: 0; transform: rotate(-15deg) scale(0.8); }
            to { opacity: 1; transform: rotate(0deg) scale(1); }
        }
        @keyframes bounceIn {
            0% { opacity: 0; transform: scale(0.5) translateY(20px); }
            50% { transform: scale(1.1) translateY(-10px); }
            100% { opacity: 1; transform: scale(1) translateY(0); }
        }
        @keyframes pulseGlow {
            0% { box-shadow: 0 0 5px rgba(16, 185, 129, 0.5); }
            50% { box-shadow: 0 0 20px rgba(16, 185, 129, 0.8); }
            100% { box-shadow: 0 0 5px rgba(16, 185, 129, 0.5); }
        }
        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

        /* Classes d'animation */
        .animate-fade-in-down { animation: fadeInDown 1s ease-out; }
        .animate-slide-in-up { animation: slideInUp 0.8s ease-out forwards; }
        .animate-rotate-in { animation: rotateIn 1.2s ease-out; }
        .animate-bounce-in { animation: bounceIn 1s ease-out forwards; }
        .animate-pulse-glow { animation: pulseGlow 2s infinite ease-in-out; }
        .animate-float { animation: float 3s infinite ease-in-out; }

        /* Style de la page (identique à plantes/show pour la cohérence) */
        body {
            background: linear-gradient(135deg, #e6f3e6 0%, #d1e8d1 100%);
            overflow-x: hidden;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        .header-section {
            background: linear-gradient(90deg, rgba(16, 185, 129, 0.1) 0%, rgba(124, 58, 237, 0.1) 100%);
            border-radius: 1rem;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        .header-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.2) 0%, transparent 70%);
            animation: rotateIn 5s infinite linear;
        }
        .header-section h1 {
            color: #7c3aed;
            font-size: 2.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
        }
        .header-section h1 i {
            color: #10b981;
            margin-right: 0.5rem;
            animation: float 3s infinite ease-in-out;
        }
        .info-section {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            margin-top: 2rem;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            border: 2px solid #7c3aed;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .info-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }
        .info-section h2 {
            color: #7c3aed;
            font-size: 1.75rem;
            font-weight: bold;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        .info-section h2 i {
            margin-right: 0.5rem;
            color: #10b981;
        }
        .info-section p, .info-section li {
            color: #374151;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        .info-section p i, .info-section li i {
            margin-right: 0.5rem;
            color: #10b981;
        }
        .info-section ul {
            list-style: none;
            padding-left: 0;
        }
        .info-section li {
            padding: 0.5rem;
            background: rgba(16, 185, 129, 0.05);
            border-radius: 0.5rem;
            margin-bottom: 0.5rem;
            transition: transform 0.3s ease, background 0.3s ease;
        }
        .info-section li:hover {
            transform: translateX(10px);
            background: rgba(16, 185, 129, 0.1);
        }
        .info-section a {
            color: #7c3aed;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        .info-section a:hover {
            color: #5b21b6;
            text-decoration: underline;
        }
        .back-btn {
            display: inline-flex;
            align-items: center;
            background: #7c3aed;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            font-weight: 600;
            text-decoration: none;
            margin-top: 2rem;
            transition: all 0.3s ease;
        }
        .back-btn i {
            margin-right: 0.5rem;
        }
        .back-btn:hover {
            background: #5b21b6;
            transform: scale(1.05);
        }

        /* Responsivité */
        @media (max-width: 640px) {
            .header-section h1 { font-size: 1.75rem; }
            .info-section { padding: 1rem; }
            .info-section h2 { font-size: 1.25rem; }
            .info-section p, .info-section li { font-size: 0.875rem; }
            .back-btn { padding: 0.5rem 1rem; font-size: 0.875rem; }
        }
        /* Ajouts pour la responsivité */
        @media (max-width: 640px) {
            .container { padding: 1rem; }
            .header-section { padding: 1.5rem 1rem; }
            .header-section h1 { font-size: 2rem; }
            .info-section { padding: 1.5rem 1rem; }
            .info-section h2 { font-size: 1.5rem; }
            .info-section p, .info-section li { 
                font-size: 0.875rem; 
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }
            .info-section p i, .info-section li i { 
                margin-right: 0.25rem; 
                margin-bottom: 0.25rem;
            }
            .back-btn { 
                padding: 0.625rem 1.25rem; 
                font-size: 0.875rem; 
                width: 100%;
                text-align: center;
                margin: 1rem auto 0;
                display: block;
            }
        }

        @media (max-width: 480px) {
            .header-section h1 { font-size: 1.75rem; }
            .info-section h2 { font-size: 1.25rem; }
            .info-section p, .info-section li { font-size: 0.8125rem; }
        }
    </style>
</head>
<body class="font-sans min-h-screen flex flex-col">
    <x-header></x-header>

    <!-- Main Content -->
    <main class="container mx-auto mt-20 flex-1">
        <section class="header-section animate-rotate-in">
            <h1>
                <i class="fas fa-vial animate-float"></i> 
                Détails de {{ $formule->nom }}
            </h1>
        </section>

        <section class="info-section animate-slide-in-up">
            <h2 class="animate-fade-in-down"><i class="fas fa-vial"></i> Informations Générales</h2>
            <p class="animate-slide-in-up" style="animation-delay: 0.2s;"><i class="fas fa-vial"></i> <strong>Nom :</strong> {{ $formule->nom }}</p>
            <p class="animate-slide-in-up" style="animation-delay: 0.3s;"><i class="fas fa-tag"></i> <strong>Catégorie :</strong> {{ $formule->categorie ?? 'N/A' }}</p>
            <p class="animate-slide-in-up" style="animation-delay: 0.4s;"><i class="fas fa-file-alt"></i> <strong>Description :</strong> {{ $formule->description ?? 'Aucune description disponible.' }}</p>
            @if($formule->indications)
                <p class="animate-slide-in-up" style="animation-delay: 0.5s;"><i class="fas fa-diagnoses"></i> <strong>Indications :</strong> {{ $formule->indications }}</p>
            @endif
            @if($formule->posologie)
                <p class="animate-slide-in-up" style="animation-delay: 0.6s;"><i class="fas fa-pills"></i> <strong>Posologie :</strong> {{ $formule->posologie }}</p>
            @endif

            <h2 class="animate-fade-in-down mt-6" style="animation-delay: 0.7s;"><i class="fas fa-seedling"></i> Plantes Associées</h2>
            @if($formule->plantes->isNotEmpty())
                <ul>
                    @foreach($formule->plantes as $plante)
                        <li class="animate-slide-in-up" style="animation-delay: {{ 0.8 + $loop->index * 0.1 }}s;">
                            <i class="fas fa-seedling"></i>
                            <a href="{{ route('plantes.show', $plante->nom_latin) }}">
                                {{ $plante->nom_latin }} ({{ $plante->pivot->role_formule }}, {{ $plante->pivot->pourcentage_formule }}%)
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="animate-slide-in-up" style="animation-delay: 0.8s;"><i class="fas fa-exclamation-triangle"></i> Aucune plante associée.</p>
            @endif
        </section>

        <a href="{{ route('formules.index') }}" class="back-btn animate-bounce-in" style="animation-delay: 0.9s;">
            <i class="fas fa-arrow-left"></i> Retour à la liste
        </a>
    </main>
    <script>
        window.addEventListener('scroll', () => {
    const header = document.querySelector('.header-section');
    const scrollPosition = window.scrollY;
    header.style.backgroundPositionY = `${scrollPosition * 0.5}px`;
});
    </script>
</body>
</html>