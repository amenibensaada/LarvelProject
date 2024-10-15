<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\front\HomeController;

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

   

});

// Protect Admin (Back Office) Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Back\DashboardController::class, 'index'])->name('admin.dashboard');
});

// Logout route for both users and admins
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
