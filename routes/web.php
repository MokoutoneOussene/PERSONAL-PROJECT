<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EnfantController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\RetenueController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PrecompteController;
use App\Http\Controllers\InstitutBankController;
use App\Http\Controllers\OccasionnelleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PagesController::class, 'index'])->name('authentification');
Route::post('seconnecter', [AuthController::class, 'login'])->name('login');
Route::post('sedeconnecter', [AuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [PagesController::class, 'dash'])->name('dashboard');
Route::get('imprimer_contrat/{id}', [ContratController::class, 'print']);

Route::resource('gestion_personnel', PersonnelController::class);
Route::get('filtrer_personnel', [PersonnelController::class, 'perso_filter'])->name('perso_filter');
Route::get('delete_personnel/{id}', [PersonnelController::class, 'destroy']);

Route::resource('gestion_mission', MissionController::class);

Route::resource('gestion_contrat', ContratController::class);

Route::resource('gestion_paiement', PaiementController::class);
Route::get('generation_paiement/{id}', [PaiementController::class, 'generation']);
Route::post('generation_paiement_groupe', [PaiementController::class, 'generationgroupe']);
Route::get('liste_paiements', [PaiementController::class, 'liste_paie'])->name('paies');
Route::get('finds_paies/{id}', [PaiementController::class, 'find']);
Route::get('imprimer_bulletin/{id}', [PaiementController::class, 'print_bulletin']);
Route::get('Filter/periode_filter', [PaiementController::class, 'date_filter'])->name('date_filter');
Route::get('Generation_plusieurs', [PaiementController::class, 'Gener_groupe'])->name('Generation_plusieurs');
Route::get('Generation/generation_bulletins', [PaiementController::class, 'generation_bulletin'])->name('generation_bulletin');
Route::get('delete_paiement/{id}', [PaiementController::class, 'destroy']);

Route::resource('gestion_occasionnelles', OccasionnelleController::class);

Route::resource('gestion_precomptes', PrecompteController::class);

Route::resource('gestion_institut_banquaire', InstitutBankController::class);

Route::resource('gestion_autres_retenues', RetenueController::class);

Route::resource('gestion_enfant', EnfantController::class);
