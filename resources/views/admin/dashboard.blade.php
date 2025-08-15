<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tableau de bord Admin - PlantMed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .sidebar {
            transition: transform 0.3s ease-in-out;
            height: calc(100vh - 80px);
            background: linear-gradient(135deg, #6CCB9A 0%, #5BB584 100%);
        }
        .sidebar-hidden {
            transform: translateX(-100%);
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            z-index: 1000;
        }
        .modal-content {
            background: white;
            margin: 12% auto;
            padding: 25px;
            width: 70%;
            max-width: 500px;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            animation: slideIn 0.4s ease-out;
        }
        @keyframes slideIn {
            from { transform: translateY(-30px) scale(0.95); opacity: 0; }
            to { transform: translateY(0) scale(1); opacity: 1; }
        }
        .card-shadow {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }
        .hover-lift {
            transition: all 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        }
        .btn-primary {
            background: linear-gradient(135deg, #6CCB9A 0%, #5BB584 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #5AA87F 0%, #4A9F73 100%);
            transform: translateY(-1px);
        }
    </style>
</head>
<body class="font-sans bg-gray-50 text-gray-800">
    <!-- Header -->
    <header class="fixed top-0 w-full bg-gradient-to-r from-green-800 to-green-700 text-white p-6 flex justify-between items-center z-50 shadow-lg transition-all duration-300 hover:from-green-900 hover:to-green-800">
        <div class="flex items-center space-x-3 group">
            <img src="{{ asset('storage/images/leaf.png') }}" alt="PlantMed Logo" class="h-8 w-8 mr-2 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-12">
            <a href="{{ route('welcome') }}" class="text-xl font-bold cursor-pointer hover:text-green-300 transition-colors duration-300">PlantMed</a>
        </div>
        <nav>
            @auth
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-5 py-2 rounded-lg hover:bg-red-600 transition-all duration-300 shadow-sm">Déconnexion</button>
                </form>
            @endauth
        </nav>
    </header>

    <!-- Sidebar -->
    <!-- Remplace la section <div> de la sidebar dans ton code -->
<div class="fixed h-full sidebar text-white w-64 p-4 animate__animated animate__fadeInLeft top-20 shadow-xl" id="sidebar">
    <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>
    <ul>
        <li class="mb-4">
            <a href="{{ route('admin.dashboard') }}" class="block p-3 rounded-lg hover:bg-white hover:bg-opacity-20 transition-all duration-300">
                Tableau de bord
            </a>
        </li>
        <li class="mb-4">
            <a href="{{ route('admin.showCreateUser') }}" class="block p-3 rounded-lg hover:bg-white hover:bg-opacity-20 transition-all duration-300">
                Créer utilisateur
            </a>
        </li>
        <li>
            <a href="{{ route('admin.showCreateAdmin') }}" class="block p-3 rounded-lg hover:bg-white hover:bg-opacity-20 transition-all duration-300">
                Créer administrateur
            </a>
        </li>
    </ul>
</div>

    <!-- Toggle Sidebar Button -->
    <button id="toggleSidebar" class="fixed top-24 left-4 bg-[#6CCB9A] text-white p-2 rounded-lg z-50 shadow-md hover:bg-[#5AA87F] transition-all duration-300">☰</button>

    <!-- Main Content -->
    <main class="ml-0 md:ml-64 p-6 pt-24 transition-all duration-300">
        <h1 class="text-4xl font-bold text-[#6CCB9A] mb-6 animate__animated animate__bounceIn">Gestion des Abonnements</h1>
        
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 mb-6 rounded-r-lg shadow-sm animate__animated animate__fadeIn">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="bg-white rounded-xl card-shadow hover-lift overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 animate__animated animate__zoomIn">
                    <thead class="bg-gradient-to-r from-[#6CCB9A] to-[#5BB584]">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">Nom</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">Abonnement Actif</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">Expire le</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($user->subscription && $user->subscription->is_paid)
                                        <span class="inline-flex px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                            Oui
                                        </span>
                                    @else
                                        <span class="inline-flex px-3 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">
                                            Non
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                    {{ $user->subscription ? $user->subscription->expires_at : '-' }}
                                </td>
                                                                <!-- Remplace la section <td> des Actions dans le <tbody> -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('admin.toggleSubscription', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        @if (!$user->subscription || !$user->subscription->is_paid)
                                            <input type="date" name="expires_at" class="border p-1 rounded mr-2" value="{{ now()->addYear()->toDateString() }}" required>
                                        @endif
                                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                                            {{ $user->subscription && $user->subscription->is_paid ? 'Désactiver' : 'Activer' }}
                                        </button>
                                    </form>
                                    <button onclick="openModal('{{ $user->id }}')" class="ml-2 bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition">Modifier</button>
                                    <button onclick="openDeleteModal('{{ $user->id }}')" 
                                            data-delete-url="{{ route('admin.destroyUser', $user->id) }}" 
                                            class="ml-2 bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                        Supprimer
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold text-[#6CCB9A]">Modifier l'utilisateur</h2>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 text-2xl font-light transition-colors duration-300">&times;</button>
            </div>
            
            <form id="editUserForm" method="POST" action="" class="space-y-5">
                @csrf
                @method('PATCH')
                <input type="hidden" name="user_id" id="editUserId">
                
                <div>
                    <label for="edit_name" class="block text-[#5A5A5A] font-medium mb-2">Nom</label>
                    <input type="text" name="name" id="edit_name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6CCB9A] focus:border-transparent transition-all duration-300" required>
                </div>
                
                <div>
                    <label for="edit_email" class="block text-[#5A5A5A] font-medium mb-2">Email</label>
                    <input type="email" name="email" id="edit_email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6CCB9A] focus:border-transparent transition-all duration-300" required>
                </div>
                
                <div>
                    <label for="edit_password" class="block text-[#5A5A5A] font-medium mb-2">
                        Mot de passe 
                        <span class="text-sm text-gray-500 font-normal">(laisser vide pour ne pas changer)</span>
                    </label>
                    <input type="password" name="password" id="edit_password" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6CCB9A] focus:border-transparent transition-all duration-300">
                </div>
                
                <div class="flex gap-3 pt-4">
                    <button type="submit" class="flex-1 btn-primary text-white px-6 py-3 rounded-lg font-medium shadow-sm">
                        Mettre à jour
                    </button>
                    <button type="button" onclick="closeModal()" class="flex-1 bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 font-medium transition-all duration-300 shadow-sm">
                        Annuler
                    </button>
                </div>
            </form>
        </div>
        
    </div>
    <!-- Delete Modal -->
        <!-- Delete Modal -->
<!-- Delete Modal -->
        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-semibold text-red-600">Confirmer la suppression</h2>
                    <button onclick="closeDeleteModal()" class="text-gray-400 hover:text-gray-600 text-2xl font-light transition-colors duration-300">&times;</button>
                </div>
                <p class="mb-6 text-gray-700">Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.</p>
                <form id="deleteUserForm" method="POST" action="" class="space-y-5">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="user_id" id="deleteUserId">
                    <div class="flex gap-3">
                        <button type="submit" class="flex-1 bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-all duration-300">Confirmer</button>
                        <button type="button" onclick="closeDeleteModal()" class="flex-1 bg-gray-300 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-400 transition-all duration-300">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    <script>
        // Fonctions globales pour les modals
        function openModal(userId) {
            console.log('Opening modal for user:', userId); // Debug
            $('#editModal').show();
            
            // Requête pour récupérer les données de l'utilisateur
            $.ajax({
                url: '/admin/edit-user/' + userId,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                success: function(data) {
                    console.log('User data received:', data); // Debug
                    $('#editUserId').val(userId);
                    $('#edit_name').val(data.user.name);
                    $('#edit_email').val(data.user.email);
                    $('#edit_password').val('');
                    $('#editUserForm').attr('action', '/admin/update-user/' + userId);
                },
                error: function(xhr, status, error) {
                    console.error('Error loading user data:', xhr.responseText); // Debug
                    alert('Erreur lors du chargement des données utilisateur: ' + (xhr.responseJSON?.message || xhr.responseText || error));
                }
            });
        }

        function closeModal() {
            $('#editModal').hide();
        }
        function openDeleteModal(userId) {
            const button = event.target;
            const deleteUrl = button.getAttribute('data-delete-url');
            
            $('#deleteModal').show();
            $('#deleteUserId').val(userId);
            $('#deleteUserForm').attr('action', deleteUrl);
        }

        function closeDeleteModal() {
            $('#deleteModal').hide();
        }

        $(document).ready(function() {
            console.log('Document ready, CSRF token:', $('meta[name="csrf-token"]').attr('content')); // Debug
            
            // Configuration globale pour jQuery AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Toggle Sidebar
            $('#toggleSidebar').click(function() {
                $('#sidebar').toggleClass('sidebar-hidden');
            });

            // Form Submission
            $('#editUserForm').submit(function(e) {
                e.preventDefault();
                console.log('Form submitted'); // Debug
                
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'PATCH',
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log('Update successful:', response); // Debug
                        closeModal();
                        // Afficher un message de succès avant de recharger
                        alert('Utilisateur mis à jour avec succès!');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Update error:', xhr.responseText); // Debug
                        let errorMessage = 'Erreur inconnue';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                            errorMessage = Object.values(xhr.responseJSON.errors).flat().join(', ');
                        } else if (xhr.responseText) {
                            errorMessage = xhr.responseText;
                        }
                        alert('Erreur: ' + errorMessage);
                    }
                });
            });

            // Fermer le modal en cliquant sur l'arrière-plan
            $(document).on('click', '.modal', function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });

            // Fermer le modal avec la touche Échap
            $(document).keyup(function(e) {
                if (e.key === "Escape") {
                    closeModal();
                }
            });
            // Delete Form Submission
        $('#deleteUserForm').submit(function(e) {
            e.preventDefault();
            if (confirm('Voulez-vous vraiment supprimer cet utilisateur ?')) {
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'DELETE',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        closeDeleteModal();
                        location.reload();
                    },
                    error: function(xhr) {
                        let errorMessage = 'Erreur inconnue';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseText) {
                            errorMessage = xhr.responseText;
                        }
                        alert('Erreur: ' + errorMessage);
                    }
                });
            }
        });

        // Close delete modal on background click
        $(document).on('click', '#deleteModal', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // Close delete modal with Escape key
        $(document).keyup(function(e) {
            if (e.key === "Escape" && $('#deleteModal').is(':visible')) {
                closeDeleteModal();
            }
        });
        });
    </script>
</body>
</html>