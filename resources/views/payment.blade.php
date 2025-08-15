<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement - PlantMed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/plantes-styles.css') }}">
</head>
<body class="font-sans min-h-screen flex flex-col relative overflow-x-hidden">
    <x-header></x-header>
    <main class="container mx-auto p-4 sm:p-6 mt-20 max-w-7xl w-full flex-1 relative z-10 text-center">
        <h1 class="text-3xl sm:text-4xl font-bold text-[#6CCB9A] mb-3">Effectuer le paiement</h1>
        <p class="text-[#5A5A5A] text-lg mb-6">Veuillez payer pour activer votre abonnement. Contactez l'administrateur ou utilisez une passerelle de paiement (à implémenter).</p>
        <a href="#" class="bg-[#6CCB9A] text-white px-4 py-2 rounded">Payer maintenant</a>
    </main>
</body>
</html>