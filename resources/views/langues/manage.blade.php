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

    <main class="container mx-auto p-4 sm:p-6 lg:p-8 mt-16 sm:mt-20 max-w-7xl w-full flex-1">
    <!-- Titre de la page -->
    <section class="text-center mb-8 lg:mb-12">
        <div class="animate-fade-in-down">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-teal-800 mb-3">
                <i class="fas fa-image mr-2 text-green-600"></i>
                Gérer les Images des Langues
            </h1>
            <p class="text-gray-600 text-sm sm:text-base lg:text-lg animate-fade-in-down" style="animation-delay: 0.2s;">
                Ajoutez ou modifiez les images associées à chaque catégorie de langue.
            </p>
        </div>
    </section>

    <!-- Messages de succès ou d'erreur -->
    @if (session('success'))
        <div class="mb-6 lg:mb-8 p-3 lg:p-4 bg-teal-100 text-teal-700 rounded-lg shadow-md animate-slide-in-up mx-4 sm:mx-0">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div class="mb-6 lg:mb-8 p-3 lg:p-4 bg-red-100 text-red-700 rounded-lg shadow-md animate-slide-in-up mx-4 sm:mx-0">
            <div class="flex items-center mb-2">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <span class="font-semibold">Erreurs détectées:</span>
            </div>
            <ul class="list-disc list-inside ml-4">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Liste des catégories avec formulaire pour ajouter/modifier l'image -->
    <section class="categories-list bg-white p-4 sm:p-6 lg:p-8 rounded-2xl shadow-lg animate-fade-in-up">
        <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-green-800 mb-6 text-center">
            Catégories et Images
        </h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            @forelse($langues as $langue)
                <div class="bg-white p-4 sm:p-6 rounded-lg shadow-md border border-green-200 hover:bg-green-50 transition-all duration-300">
                    <h3 class="text-lg sm:text-xl font-semibold text-green-700 mb-4 text-center">
                        {{ $langue->categorie }}
                    </h3>
                    
                    <!-- Affichage de l'image actuelle -->
                    <div class="mb-4 text-center">
                        @if($langue->image)
                            <div class="image-container mx-auto">
                                <img src="{{ asset($langue->image) }}" 
                                     alt="Langue pour {{ $langue->categorie }}" 
                                     class="mx-auto w-24 h-24 sm:w-32 sm:h-32 object-cover rounded-full shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer"
                                     onclick="openImageModal('{{ asset($langue->image) }}', '{{ $langue->categorie }}')">
                                <p class="text-gray-600 text-xs sm:text-sm mt-2">Image actuelle (cliquez pour agrandir)</p>
                            </div>
                        @else
                            <div class="w-24 h-24 sm:w-32 sm:h-32 mx-auto bg-gray-200 rounded-full flex items-center justify-center">
                                <i class="fas fa-image text-gray-400 text-2xl sm:text-3xl"></i>
                            </div>
                            <p class="text-gray-600 text-xs sm:text-sm mt-2">Aucune image disponible</p>
                        @endif
                    </div>
                    
                    <!-- Formulaire pour uploader une nouvelle image -->
                    <form action="{{ route('langues.updateImage', $langue->id) }}" 
                          method="POST" 
                          enctype="multipart/form-data" 
                          class="upload-form">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-4">
                            <label for="image-{{ $langue->id }}" class="block text-sm font-medium text-gray-700 mb-2 text-center">
                                Nouvelle image :
                            </label>
                            
                            <div class="file-input-wrapper">
                                <label for="image-{{ $langue->id }}" class="file-input-button">
                                    <i class="fas fa-upload mr-2"></i>
                                    Choisir une image
                                </label>
                                <input type="file" 
                                       id="image-{{ $langue->id }}" 
                                       name="image" 
                                       accept="image/*" 
                                       class="file-input"
                                       onchange="updateFileName(this, {{ $langue->id }})">
                            </div>
                            
                            <div id="file-name-{{ $langue->id }}" class="text-xs text-gray-600 text-center mt-1 min-h-[1rem]"></div>
                            
                            <div class="progress-bar" id="progress-{{ $langue->id }}">
                                <div class="progress-fill"></div>
                            </div>
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-green-600 text-white px-4 py-2 sm:py-3 rounded-lg hover:bg-green-700 transition-all duration-300 shadow-md hover:shadow-lg text-sm sm:text-base font-medium">
                            <i class="fas fa-save mr-2"></i>
                            Mettre à jour l'image
                        </button>
                    </form>
                </div>
            @empty
                <div class="col-span-full text-center p-8">
                    <i class="fas fa-folder-open text-gray-400 text-4xl mb-4"></i>
                    <p class="text-gray-500 text-lg">Aucune catégorie trouvée.</p>
                </div>
            @endforelse
        </div>
    </section>
</main>

<!-- Modal pour agrandir l'image -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4" onclick="closeImageModal()">
    <div class="relative max-w-4xl max-h-full">
        <button onclick="closeImageModal()" class="absolute -top-10 right-0 text-white text-2xl hover:text-gray-300 transition-colors">
            <i class="fas fa-times"></i>
        </button>
        <img id="modalImage" src="" alt="" class="max-w-full max-h-[80vh] object-contain rounded-lg shadow-2xl">
        <p id="modalCaption" class="text-white text-center mt-4 text-lg font-semibold"></p>
    </div>
</div>

<script>
function updateFileName(input, id) {
    const fileName = input.files[0]?.name || '';
    const fileNameElement = document.getElementById(`file-name-${id}`);
    
    if (fileName) {
        fileNameElement.textContent = `Fichier sélectionné: ${fileName}`;
        fileNameElement.className = 'text-xs text-green-600 text-center mt-1 min-h-[1rem]';
    } else {
        fileNameElement.textContent = '';
        fileNameElement.className = 'text-xs text-gray-600 text-center mt-1 min-h-[1rem]';
    }
}

function openImageModal(src, caption) {
    document.getElementById('modalImage').src = src;
    document.getElementById('modalCaption').textContent = caption;
    document.getElementById('imageModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
    document.body.style.overflow = '';
}

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});
</script>

    
</body>
</html>