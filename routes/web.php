<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanteController;
use App\Http\Controllers\FormuleController;
use App\Http\Controllers\SyndromeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\Auth\RegisterController; // Ajout du contrôleur d'inscription
use App\Http\Controllers\Auth\LoginController; // Ajout du contrôleur de connexion (si non existant)
use Illuminate\Support\Facades\Auth;


// Route publique : page de présentation
Route::get('/', function () {
    return view('presentation');
})->name('presentation');

// Routes pour l'authentification (publiques)
//Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Routes de connexion (publiques)
//Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Déconnexion (protégée par auth)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route home pour les utilisateurs connectés
//Route::get('/welcome', [SearchController::class, 'index'])->name('welcome')->middleware('auth');
Route::get('/payment', function () {
    return view('payment');
})->name('payment');

Route::get('/subscriptions/expired', function () {
        return view('subscriptions.expired');
    })->name('subscriptions.expired');


// Groupement des routes protégées par authentification
Route::middleware(['auth', 'subscriptionCheck',])->group(function () {
    Route::get('/welcome', [SearchController::class, 'index'])->name('welcome');
    Route::get('/plante', [PlanteController::class, 'index'])->name('plantes.index');
    Route::get('/plante/create', [PlanteController::class, 'create'])->name('plantes.create');
    Route::post('/plante', [PlanteController::class, 'store'])->name('plantes.store');
    Route::get('/plante/{id}/edit', [PlanteController::class, 'edit'])->name('plantes.edit');
    Route::put('/plante/{id}', [PlanteController::class, 'update'])->name('plantes.update');
    Route::get('/plante/{nom_latin}', [PlanteController::class, 'show'])->name('plantes.show');
    Route::get('/formules', [FormuleController::class, 'index'])->name('formules.index');
    Route::get('/formules/create', [FormuleController::class, 'create'])->name('formules.create');
    Route::get('/formules/{nom}', [FormuleController::class, 'show'])->name('formules.show');
    Route::get('/formules/id/{id}', [FormuleController::class, 'showById'])->name('formules.showById');
    Route::get('/syndromes', [SyndromeController::class, 'index'])->name('syndromes.index');
    Route::get('/syndromes/create', [SyndromeController::class, 'create'])->name('syndromes.create');
    Route::get('/syndromes/{id}', [SyndromeController::class, 'show'])->name('syndromes.show');
    Route::get('/langues', [LangueController::class, 'index'])->name('langues.index');
    Route::get('/langues/manage', [LangueController::class, 'manage'])->name('langues.manage');
    Route::patch('/langues/{id}/image', [LangueController::class, 'updateImage'])->name('langues.updateImage');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
});
// Routes pour les administrateurs
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/create-user', [AdminController::class, 'showCreateUserForm'])->name('admin.showCreateUser');
    Route::post('/admin/create-user', [AdminController::class, 'createUser'])->name('admin.createUser');
    Route::get('/admin/create-admin', [AdminController::class, 'showCreateAdminForm'])->name('admin.showCreateAdmin');
    Route::post('/admin/create-admin', [AdminController::class, 'createAdmin'])->name('admin.createAdmin');
    Route::patch('/admin/toggle-subscription/{userId}', [AdminController::class, 'toggleSubscription'])->name('admin.toggleSubscription');
    Route::get('/admin/edit-user/{userId}', [AdminController::class, 'showEditUserForm'])->name('admin.showEditUser');
    Route::patch('/admin/update-user/{userId}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
    Route::delete('/admin/destroy-user/{userId}', [AdminController::class, 'destroyUser'])->name('admin.destroyUser');
});

// Fallback route
Route::fallback(function () {
    return view('errors.404');
})->name('fallback');