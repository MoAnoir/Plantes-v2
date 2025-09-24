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
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                z-index: 40;
                width: 280px;
            }
            .sidebar-hidden {
                transform: translateX(-100%);
            }
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
            margin: 5% auto;
            padding: 20px;
            width: 90%;
            max-width: 500px;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            animation: slideIn 0.4s ease-out;
            max-height: 80vh;
            overflow-y: auto;
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
        
        /* Responsive table styles */
        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            
            .table-mobile {
                min-width: 600px;
            }
            
            .admin-content {
                margin-left: 0;
                padding: 1rem;
            }
            
            .admin-content.sidebar-open {
                margin-left: 0;
            }
        }
        
        @media (min-width: 769px) {
            .admin-content {
                margin-left: 16rem;
            }
            
            .sidebar {
                position: fixed;
            }
        }
    </style>
</head>
<body class="font-sans bg-gray-50 text-gray-800">
    <!-- Header -->
    <header class="fixed top-0 w-full bg-gradient-to-r from-green-800 to-green-700 text-white p-4 md:p-6 flex justify-between items-center z-50 shadow-lg transition-all duration-300 hover:from-green-900 hover:to-green-800">
        <div class="flex items-center space-x-3 group">
            <img src="{{ asset('storage/images/leaf.png') }}" alt="PlantMed Logo" class="h-6 w-6 md:h-8 md:w-8 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-12">
            <a href="{{ route('welcome') }}" class="text-lg md:text-xl font-bold cursor-pointer hover:text-green-300 transition-colors duration-300">PlantMed</a>
        </div>
        <nav>
            @auth
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-3 py-2 md:px-5 md:py-2 rounded-lg hover:bg-red-600 transition-all duration-300 shadow-sm text-sm md:text-base">Déconnexion</button>
                </form>
            @endauth
        </nav>
    </header>

    <!-- Sidebar -->
    <div class="fixed h-full sidebar text-white w-64 md:w-64 p-4 animate__animated animate__fadeInLeft top-16 md:top-20 shadow-xl sidebar-hidden md:sidebar-visible" id="sidebar">
        <h2 class="text-xl md:text-2xl font-bold mb-6">Admin Panel</h2>
        <ul>
            <li class="mb-4">
                <a href="{{ route('admin.dashboard') }}" class="block p-3 rounded-lg hover:bg-white hover:bg-opacity-20 transition-all duration-300 text-sm md:text-base">
                    Tableau de bord
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('admin.showCreateUser') }}" class="block p-3 rounded-lg hover:bg-white hover:bg-opacity-20 transition-all duration-300 text-sm md:text-base">
                    Créer utilisateur
                </a>
            </li>
            <li>
                <a href="{{ route('admin.showCreateAdmin') }}" class="block p-3 rounded-lg hover:bg-white hover:bg-opacity-20 transition-all duration-300 text-sm md:text-base">
                    Créer administrateur
                </a>
            </li>
        </ul>
    </div>

    <!-- Toggle Sidebar Button -->
    <button id="toggleSidebar" class="fixed top-20 md:top-24 left-4 bg-[#6CCB9A] text-white p-2 rounded-lg z-50 shadow-md hover:bg-[#5AA87F] transition-all duration-300 md:hidden">☰</button>

    <!-- Main Content -->
    <main class="admin-content p-4 md:p-6 pt-20 md:pt-24 transition-all duration-300">
        <h1 class="text-2xl md:text-4xl font-bold text-[#6CCB9A] mb-6 animate__animated animate__bounceIn">Gestion des Abonnements</h1>
        
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
            <div class="table-responsive">
                <table class="table-mobile min-w-full divide-y divide-gray-200 animate__animated animate__zoomIn">
                    <thead class="bg-gradient-to-r from-[#6CCB9A] to-[#5BB584]">
                        <tr>
                            <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs md:text-sm font-semibold text-white uppercase tracking-wider">Nom</th>
                            <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs md:text-sm font-semibold text-white uppercase tracking-wider">Email</th>
                            <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs md:text-sm font-semibold text-white uppercase tracking-wider hidden md:table-cell">Abonnement Actif</th>
                            <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs md:text-sm font-semibold text-white uppercase tracking-wider hidden lg:table-cell">Expire le</th>
                            <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs md:text-sm font-semibold text-white uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap font-medium text-gray-900 text-xs md:text-sm">
                                    {{ $user->name }}
                                    <!-- Mobile: Show subscription status below name -->
                                    <div class="md:hidden text-xs">
                                        @if($user->subscription && $user->subscription->is_paid)
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Actif</span>
                                        @else
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">Inactif</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-gray-600 text-xs md:text-sm truncate max-w-32 md:max-w-none">
                                    {{ $user->email }}
                                    <!-- Mobile: Show expiry date below email -->
                                    <div class="lg:hidden text-xs text-gray-500">
                                        Exp: {{ $user->subscription ? $user->subscription->expires_at : '-' }}
                                    </div>
                                </td>
                                <td class="hidden md:table-cell px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                    @if($user->subscription && $user->subscription->is_paid)
                                        <span class="inline-flex px-2 md:px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Oui</span>
                                    @else
                                        <span class="inline-flex px-2 md:px-3 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">Non</span>
                                    @endif
                                </td>
                                <td class="hidden lg:table-cell px-3 md:px-6 py-3 md:py-4 whitespace-nowrap text-gray-600 text-xs md:text-sm">
                                    {{ $user->subscription ? $user->subscription->expires_at : '-' }}
                                </td>
                                <td class="px-3 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                    <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-2">
                                        <form action="{{ route('admin.toggleSubscription', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            @if (!$user->subscription || !$user->subscription->is_paid)
                                                <input type="date" name="expires_at" class="border p-1 rounded text-xs w-full md:w-auto mb-1 md:mb-0 md:mr-2" value="{{ now()->addYear()->toDateString() }}" required>
                                            @endif
                                            <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition text-xs w-full md:w-auto">
                                                {{ $user->subscription && $user->subscription->is_paid ? 'Désactiver' : 'Activer' }}
                                            </button>
                                        </form>
                                        <div class="flex space-x-2">
                                            <button onclick="openModal('{{ $user->id }}')" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 transition text-xs">
                                                Modifier
                                            </button>
                                            <button onclick="openDeleteModal('{{ $user->id }}')" 
                                                    data-delete-url="{{ route('admin.destroyUser', $user->id) }}" 
                                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition text-xs">
                                                Supprimer
                                            </button>
                                        </div>
                                    </div>
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
                <h2 class="text-lg md:text-2xl font-semibold text-[#6CCB9A]">Modifier l'utilisateur</h2>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 text-2xl font-light transition-colors duration-300">&times;</button>
            </div>
            
            <form id="editUserForm" method="POST" action="" class="space-y-4 md:space-y-5">
                @csrf
                @method('PATCH')
                <input type="hidden" name="user_id" id="editUserId">
                
                <div>
                    <label for="edit_name" class="block text-[#5A5A5A] font-medium mb-2 text-sm md:text-base">Nom</label>
                    <input type="text" name="name" id="edit_name" class="w-full p-2 md:p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6CCB9A] focus:border-transparent transition-all duration-300 text-sm md:text-base" required>
                </div>
                
                <div>
                    <label for="edit_email" class="block text-[#5A5A5A] font-medium mb-2 text-sm md:text-base">Email</label>
                    <input type="email" name="email" id="edit_email" class="w-full p-2 md:p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6CCB9A] focus:border-transparent transition-all duration-300 text-sm md:text-base" required>
                </div>
                
                <div>
                    <label for="edit_password" class="block text-[#5A5A5A] font-medium mb-2 text-sm md:text-base">
                        Mot de passe 
                        <span class="text-xs md:text-sm text-gray-500 font-normal">(laisser vide pour ne pas changer)</span>
                    </label>
                    <input type="password" name="password" id="edit_password" class="w-full p-2 md:p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6CCB9A] focus:border-transparent transition-all duration-300 text-sm md:text-base">
                </div>
                
                <div class="flex flex-col md:flex-row gap-3 pt-4">
                    <button type="submit" class="flex-1 btn-primary text-white px-4 md:px-6 py-2 md:py-3 rounded-lg font-medium shadow-sm text-sm md:text-base">
                        Mettre à jour
                    </button>
                    <button type="button" onclick="closeModal()" class="flex-1 bg-red-500 text-white px-4 md:px-6 py-2 md:py-3 rounded-lg hover:bg-red-600 font-medium transition-all duration-300 shadow-sm text-sm md:text-base">
                        Annuler
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg md:text-2xl font-semibold text-red-600">Confirmer la suppression</h2>
                <button onclick="closeDeleteModal()" class="text-gray-400 hover:text-gray-600 text-2xl font-light transition-colors duration-300">&times;</button>
            </div>
            <p class="mb-6 text-gray-700 text-sm md:text-base">Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.</p>
            <form id="deleteUserForm" method="POST" action="" class="space-y-4 md:space-y-5">
                @csrf
                @method('DELETE')
                <input type="hidden" name="user_id" id="deleteUserId">
                <div class="flex flex-col md:flex-row gap-3">
                    <button type="submit" class="flex-1 bg-red-600 text-white px-4 md:px-6 py-2 md:py-3 rounded-lg hover:bg-red-700 transition-all duration-300 text-sm md:text-base">Confirmer</button>
                    <button type="button" onclick="closeDeleteModal()" class="flex-1 bg-gray-300 text-gray-800 px-4 md:px-6 py-2 md:py-3 rounded-lg hover:bg-gray-400 transition-all duration-300 text-sm md:text-base">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle Sidebar for mobile
        $('#toggleSidebar').click(function() {
            $('#sidebar').toggleClass('sidebar-hidden');
        });

        // Close sidebar when clicking outside on mobile
        $(document).click(function(e) {
            if ($(window).width() <= 768) {
                if (!$(e.target).closest('#sidebar, #toggleSidebar').length) {
                    $('#sidebar').addClass('sidebar-hidden');
                }
            }
        });

        // Responsive sidebar handling
        $(window).resize(function() {
            if ($(window).width() > 768) {
                $('#sidebar').removeClass('sidebar-hidden');
            } else {
                $('#sidebar').addClass('sidebar-hidden');
            }
        });

        // Existing modal functions
        function openModal(userId) {
            $('#editModal').show();
            
            $.ajax({
                url: '/admin/edit-user/' + userId,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                success: function(data) {
                    $('#editUserId').val(userId);
                    $('#edit_name').val(data.user.name);
                    $('#edit_email').val(data.user.email);
                    $('#edit_password').val('');
                    $('#editUserForm').attr('action', '/admin/update-user/' + userId);
                },
                error: function(xhr, status, error) {
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
            // Configuration globale pour jQuery AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Form Submission
            $('#editUserForm').submit(function(e) {
                e.preventDefault();
                
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'PATCH',
                    data: $(this).serialize(),
                    success: function(response) {
                        closeModal();
                        alert('Utilisateur mis à jour avec succès!');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
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

            // Close modals on background click
            $(document).on('click', '.modal', function(e) {
                if (e.target === this) {
                    closeModal();
                    closeDeleteModal();
                }
            });

            // Close modals with Escape key
            $(document).keyup(function(e) {
                if (e.key === "Escape") {
                    closeModal();
                    closeDeleteModal();
                }
            });
        });
    </script>
</body>
</html>