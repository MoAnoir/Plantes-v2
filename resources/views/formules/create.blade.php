<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Formule - PlantMed</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 sm:p-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-green-800 mb-6">Ajouter une Formule</h1>
        <form action="#" method="POST" class="max-w-lg mx-auto">
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 font-medium mb-2">Nom</label>
                <input type="text" id="nom" name="nom" class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea id="description" name="description" class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500" rows="4"></textarea>
            </div>
            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 transition-all duration-300">Enregistrer</button>
        </form>
    </div>
</body>
</html>