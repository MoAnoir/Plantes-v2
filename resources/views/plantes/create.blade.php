<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($plante) ? 'Modifier une Plante' : 'Ajouter une Plante' }} - PlantMed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 1s ease-out; }

        <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in-up { animation: fadeInUp 1s ease-out; }

        /* Forcer la couleur du texte des options */
        select#plante_id option {
            color: #1f2937; /* Équivalent à text-gray-800 */
        }
    </style>
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <x-header/>
    <br><br>
    <div class="container mx-auto p-2 sm:p-8 flex-1 mt-2">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ url()->previous() }}" class="text-lg text-white hover:text-gray-200 font-bold hover:underline transition-all duration-300 bg-green-800 px-4 py-2 rounded-lg mt-5">Retour</a>
        </div>

        <!-- Liste des plantes -->
    <div class="max-w-xl mx-auto bg-white shadow-lg rounded-2xl p-6 mb-6 animate-fade-in">
        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-4">Sélectionner une Plante à Modifier</h2>
        <form id="selectPlanteForm" action="{{ route('plantes.edit', ['id' => '__ID__']) }}" method="GET">
            <div class="space-y-2">
                <label for="plante_id" class="block text-lg font-medium text-gray-700">Plantes Existantes</label>
                <select id="plante_id" name="id" class="w-full p-3 border border-black-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">
                    <option value="">-- Sélectionner une plante --</option>
                    @foreach($plantes as $p)
                        <option value="{{ $p->id }}" {{ isset($plante) && $plante->id == $p->id ? 'selected' : '' }}>{{ $p->nom_latin }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

        <!-- Formulaire pour ajouter ou modifier une plante -->
        <form action="{{ isset($plante) ? route('plantes.update', $plante->id) : route('plantes.store') }}" method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto bg-white shadow-lg rounded-2xl p-6 space-y-6 mt-6 animate-fade-in">
            @csrf
            @if(isset($plante))
                @method('PUT')
            @endif
        
            {{-- Title --}}
            <h2 class="text-2xl font-semibold text-gray-800 text-center">{{ isset($plante) ? 'Modifier une Plante' : 'Ajouter une Plante' }}</h2>
        
            {{-- Nom (Français) --}}
            <div class="space-y-2">
                <label for="nom" class="block text-lg font-medium text-gray-700">Nom (Français) <span class="text-red-500">*</span></label>
                <input type="text" id="nom" name="nom"
                       class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 @error('nom') border-red-500 @enderror"
                       value="{{ isset($plante) ? $plante->nom : old('nom') }}" placeholder="Nom de la plante">
                @error('nom')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        
            {{-- Nom Chinois --}}
            <div class="space-y-2">
                <label for="nom_chinois" class="block text-lg font-medium text-gray-700">Nom Chinois</label>
                <input type="text" id="nom_chinois" name="nom_chinois"
                       class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500"
                       value="{{ isset($plante) ? $plante->nom_chinois : old('nom_chinois') }}" placeholder="Nom chinois">
            </div>
        
            {{-- Nom Latin --}}
            <div class="space-y-2">
                <label for="nom_latin" class="block text-lg font-medium text-gray-700">Nom Latin</label>
                <input type="text" id="nom_latin" name="nom_latin"
                       class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500"
                       value="{{ isset($plante) ? $plante->nom_latin : old('nom_latin') }}" placeholder="Nom latin">
            </div>
        
            {{-- Partie Utilisée --}}
            <div class="space-y-2">
                <label for="partie_utilisee" class="block text-lg font-medium text-gray-700">Partie Utilisée</label>
                <input type="text" id="partie_utilisee" name="partie_utilisee"
                       class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500"
                       value="{{ isset($plante) ? $plante->partie_utilisee : old('partie_utilisee') }}" placeholder="Ex: Feuille, Racine, Fleur">
            </div>
        
            {{-- Description --}}
            <div class="space-y-2">
                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea id="description" name="description"
                          class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500"
                          rows="4" placeholder="Décrivez la plante...">{{ isset($plante) ? $plante->description : old('description') }}</textarea>
            </div>
        
            {{-- Image Upload --}}
            <div class="space-y-2">
                <label for="image" class="block text-lg font-medium text-gray-700">Image</label>
                @if(isset($plante) && $plante->image)
                    <div class="mb-2">
                        <img src="{{ asset($plante->image) }}" alt="{{ $plante->nom }}" class="w-32 h-32 object-cover rounded-lg">
                    </div>
                @endif
                <input type="file" id="image" name="image"
                       class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        
            {{-- Submit Button --}}
            <button type="submit"
                    class="w-full bg-green-600 text-white text-lg font-semibold px-6 py-3 rounded-xl hover:bg-green-700 transition-all duration-300 shadow-md">
                {{ isset($plante) ? 'Modifier' : 'Enregistrer' }}
            </button>
        </form>
    </div>

    <script>
        document.getElementById('plante_id').addEventListener('change', function() {
            const planteId = this.value;
            if (planteId) {
                const form = document.getElementById('selectPlanteForm');
                form.action = form.action.replace('__ID__', planteId);
                form.submit();
            }
        });
    </script>
</body>
</html>