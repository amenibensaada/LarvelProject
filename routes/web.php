<?php

use App\Http\Controllers\AssociationBackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\BeneficiaireBackController;
use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\TransporteurController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\ReclamationController;




use App\Http\Controllers\ProductController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\EvenementCategoryController;


use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\Admin\CategoryController;

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

    Route::resource('/associations', AssociationController::class);
    Route::get('/associations/create', [AssociationController::class, 'create'])->name('associations.create'); // Form to apply as a restaurant partner
    Route::get('/associations/all', [AssociationController::class, 'allAssociations'])->name('Associations.all'); // View all restaurants
    Route::get('/associations/{id}', [AssociationController::class, 'show'])->name('associations.show'); // View single restaurant details
    Route::delete('/associations/{id}', [AssociationController::class, 'destroy'])->name('associations.destroy'); // Delete restaurant
    Route::put('/associations/{id}', [AssociationController::class, 'update'])->name('associations.update'); // Update restaurant details
    Route::get('/associations/{id}/edit', [RestaurantController::class, 'edit'])->name('associations.edit'); // Form to edit restaurant

    Route::resource('/beneficiares', BeneficiaireController::class);
    Route::get('/beneficiares/create', [BeneficiaireController::class, 'create'])->name('beneficiares.create'); // Form to apply as a restaurant partner
    Route::get('/beneficiares/all', [BeneficiaireController::class, 'allBeneficiare'])->name('Beneficiares.all'); // View all restaurants
    Route::get('/beneficiares/{id}', [BeneficiaireController::class, 'show'])->name('beneficiares.show'); // View single restaurant details

   

    // Restaurant Items Routes (for managing items within a restaurant)
    Route::get('/restaurants/{restaurant}/items/create', [App\Http\Controllers\RestaurantItemController::class, 'create'])->name('restaurant_items.create'); // Form to add a new item
    Route::post('/restaurants/{restaurant}/items', [App\Http\Controllers\RestaurantItemController::class, 'store'])->name('restaurant_items.store'); // Store new item
    // Route::get('/items/{item}/edit', [App\Http\Controllers\RestaurantItemController::class, 'edit'])->name('restaurant_items.edit'); // Form to edit an item
    Route::put('/items/{item}', [App\Http\Controllers\RestaurantItemController::class, 'update'])->name('restaurant_items.update'); // Update existing item
    Route::delete('/items/{item}', [App\Http\Controllers\RestaurantItemController::class, 'destroy'])->name('restaurant_items.destroy'); // Delete an item
});


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

// Protect Admin (Back Office) Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Back\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/livraison', [LivraisonController::class, 'allLivraisons'])->name('livraisons.livraison');
    Route::get('/transporteurs', [TransporteurController::class, 'adminindex'])->name('transporteurs.admontransporteur'); // Liste des transporteurs
    Route::resource('/associationsBack', AssociationBackController::class);
    Route::delete('/associationsBack/{id}', [AssociationBackController::class, 'destroy'])->name('associations1.destroy'); // Delete restaurant
    Route::resource('/beneficiairesBack', BeneficiaireBackController::class);
    Route::delete('/beneficiaresBack/{id}', [BeneficiaireBackController::class, 'destroy'])->name('beneficiares1.destroy'); // Delete restaurant




    Route::get('/restaurants', [RestaurantController::class, 'adminIndex'])->name('back.restaurant.index');
    Route::post('/restaurants', [RestaurantController::class, 'adminStore'])->name('back.restaurant.store');
    Route::put('/restaurants/{id}', [RestaurantController::class, 'adminUpdate'])->name('back.restaurant.update');
    Route::delete('/restaurants/{id}', [RestaurantController::class, 'adminDestroy'])->name('back.restaurant.destroy');
    Route::get('dashboard', [App\Http\Controllers\Back\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::get('/events', [EvenementController::class, 'adminindex'])->name('events.indexadmin');
});


// Logout route for both users and admins
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('products', ProductController::class);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');


// Events routes

Route::resource('events', EvenementController::class);

// Route::get('/events', [EvenementController::class, 'index'])->name('events.index');
// 
// Route::resource('evenements', EvenementController::class);

Route::resource('evenement-categories', EvenementCategoryController::class);
Route::resource('product_stocks', \App\Http\Controllers\ProductStockController::class);
