<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return redirect()->route('login');
});


// Front office routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
//Route::get('logout', [LoginController::class, 'userLogout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');

// Protect front office routes
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');
});

// Admin (back office) routes
Route::prefix('admin')->group(function () {
  

    Route::middleware(['auth', 'checkAdminRole'])->group(function () {
        Route::get('dashboard', [App\Http\Controllers\Back\DashboardController::class, 'index'])->name('admin.dashboard');
    });
});


