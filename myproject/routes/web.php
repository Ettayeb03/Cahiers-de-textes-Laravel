<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [TaskController::class, 'create'])->name('home');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Page admin : Accessible uniquement aux admins
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

// Page home : Accessible uniquement aux professeurs
Route::middleware(['auth', 'role:prof'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
});


// Route pour afficher le formulaire de connexion
Route::get('/', function () {
    return view('login'); // Assurez-vous que le fichier est nommé login.blade.php
})->name('login');

Route::get('/profs', [ProfController::class, 'index'])->name('profs.index');
Route::resource('profs', ProfController::class);
Route::get('/profs/create', [ProfController::class, 'create'])->name('profs.create');
Route::post('/profs', [ProfController::class, 'store'])->name('profs.store');

// Route pour déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('login');

// Route pour afficher la page d'accueil après la connexion
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Routes pour les modules
Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
Route::resource('modules', ModuleController::class);
Route::delete('/modules/{id}', [ModuleController::class, 'destroy'])->name('modules.destroy');

// Routes pour les groupes
Route::resource('groupes', GroupeController::class)->middleware('groupes.index');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/groupes', [ModuleController::class, 'index'])->name('groupes.index');


Route::resource('profs', ProfController::class);
Route::resource('modules', ModuleController::class);
Route::resource('filieres', FiliereController::class);
Route::resource('groupes', GroupeController::class);




Route::get('/registration/form',[AuthController::class,'loadRegisterForm']);
// create an Authentication Controller
Route::post('/home',[AuthController::class,'LoginUser'])->name('LoginUser');
Route::get('/Admin',[AuthController::class,'loadHomePage']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot/password',[AuthController::class,'forgotPassword']);
Route::post('/forgot',[AuthController::class,'forgot'])->name('forgot');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', [HomeController::class, 'show'])->name('home');

Route::get('/historique-cahiers', [AuthController::class, 'historiqueCahiers'])->name('historique.cahiers');



Route::get('/cahiers/{id}/edit', [TaskController::class, 'edit'])->name('cahiers.edit'); // Pour afficher le formulaire
Route::put('/cahiers/{id}', [TaskController::class, 'update'])->name('cahiers.update');
Route::delete('/cahiers/{id}', [TaskController::class, 'destroy'])->name('cahiers.destroy'); // Pour supprimer


