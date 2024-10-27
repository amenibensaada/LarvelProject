<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\TransporteurController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\ReclamationController;





// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Guest Routes (Login & Registration)
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register.post');
});

// Protect Front Office Routes (Users)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/home', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');
    // Restaurant Routes
    Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index'); // View user restaurants
    Route::get('/restaurants/all', [RestaurantController::class, 'allRestaurants'])->name('restaurants.all'); // View all restaurants
    Route::get('/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create'); // Form to apply as a restaurant partner
    Route::post('/restaurants', [RestaurantController::class, 'store'])->name('restaurants.store'); // Store restaurant details
    Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurants.show'); // View single restaurant details
    Route::get('/restaurants/{id}/edit', [RestaurantController::class, 'edit'])->name('restaurants.edit'); // Form to edit restaurant
    Route::put('/restaurants/{id}', [RestaurantController::class, 'update'])->name('restaurants.update'); // Update restaurant details
    Route::delete('/restaurants/{id}', [RestaurantController::class, 'destroy'])->name('restaurants.destroy'); // Delete restaurant


    // Routes pour les transporteurs
    Route::get('/transporteurs', [TransporteurController::class, 'index'])->name('transporteurs.index') ->middleware('auth'); // Liste des transporteurs
    Route::get('/transporteur', [TransporteurController::class, 'transport'])->name('transporteurs.transport'); // Liste des transporteurs

    Route::get('/transporteurs/create', [TransporteurController::class, 'create'])->name('transporteurs.create'); // Formulaire pour créer un transporteur
    Route::post('/transporteurs', [TransporteurController::class, 'store'])->name('transporteurs.store'); // Enregistrer un nouveau transporteur
    Route::get('/transporteurs/{id}', [TransporteurController::class, 'show'])->name('transporteurs.show'); // Voir les détails d'un transporteur
    Route::get('/transporteurs/{id}/edit', [TransporteurController::class, 'edit'])->name('transporteurs.edit'); // Formulaire de modification du transporteur
    Route::put('/transporteurs/{id}', [TransporteurController::class, 'update'])->name('transporteurs.update'); // Mettre à jour un transporteur
    Route::delete('/transporteurs/{id}', [TransporteurController::class, 'destroy'])->name('transporteurs.destroy'); // Supprimer un transporteur

    // Routes pour les livraisons
    Route::get('/livraisons', [LivraisonController::class, 'index'])->name('livraisons.index'); // Liste des livraisons
    Route::get('/livraison', [LivraisonController::class, 'allLivraisons'])->name('livraisons.livraison');
    Route::get('/livraisons/create', [LivraisonController::class, 'create'])->name('livraisons.create'); // Formulaire pour créer une livraison
    Route::post('/livraisons', [LivraisonController::class, 'store'])->name('livraisons.store'); // Enregistrer une nouvelle livraison
    Route::get('/livraisons/{id}', [LivraisonController::class, 'show'])->name('livraisons.show'); // Voir les détails d'une livraison
    Route::get('/livraisons/{id}/edit', [LivraisonController::class, 'edit'])->name('livraisons.edit'); // Formulaire de modification d'une livraison
    Route::put('/livraisons/{id}', [LivraisonController::class, 'update'])->name('livraisons.update'); // Mettre à jour une livraison
    Route::delete('/livraisons/{id}', [LivraisonController::class, 'destroy'])->name('livraisons.destroy'); // Supprimer une livraison

    // Routes pour les réclamations
Route::prefix('/livraisons/{livraison}')->group(function () {
    Route::get('/reclamations', [ReclamationController::class, 'index'])->name('reclamations.index'); // Liste des réclamations pour une livraison
    Route::get('/reclamations/create', [ReclamationController::class, 'create'])->name('reclamations.create'); // Formulaire pour créer une réclamation
    Route::post('/reclamations', [ReclamationController::class, 'store'])->name('reclamations.store'); // Enregistrer une nouvelle réclamation
    Route::get('/{reclamation}', [ReclamationController::class, 'show'])->name('reclamations.show'); // Voir les détails d'une réclamation
    Route::get('/reclamations/{reclamation}/edit', [ReclamationController::class, 'edit'])->name('reclamations.edit'); // Formulaire de modification d'une réclamation
    Route::put('/reclamations/{reclamation}', [ReclamationController::class, 'update'])->name('reclamations.update'); // Mettre à jour une réclamation
    Route::delete('/reclamations/{reclamation}', [ReclamationController::class, 'destroy'])->name('reclamations.destroy'); // Supprimer une réclamation
});
});
// Protect Admin (Back Office) Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Back\DashboardController::class, 'index'])->name('admin.dashboard');
});

// Logout route for both users and admins
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
