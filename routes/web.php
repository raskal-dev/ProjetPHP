<?php

use App\Http\Controllers\AchatController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\CiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogementController;
use App\Http\Controllers\TerrainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes Agence
Route::get('/agence', [AgenceController::class, 'index'])->name('agence');
Route::get('/agence/create', [AgenceController::class, 'create'])->name('agence.create');
Route::post('/agence/save', [AgenceController::class, 'store'])->name('agence.save');
Route::get('/agence/edit/{agence}', [AgenceController::class, 'edit'])->name('agence.edit');
Route::put('/agence/update/{agence}', [AgenceController::class, 'update'])->name('agence.update');
Route::delete('/agence/delete/{agence}', [AgenceController::class, 'destroy'])->name('agence.delete');

// Route Cite
Route::get('/cite', [CiteController::class, 'index'])->name('cite');
Route::get('/cite/create', [CiteController::class, 'create'])->name('cite.create');
Route::post('/cite/save', [CiteController::class, 'store'])->name('cite.save');
Route::get('/cite/edit/{cite}', [CiteController::class, 'edit'])->name('cite.edit');
Route::put('/cite/update/{cite}', [CiteController::class, 'update'])->name('cite.update');
Route::delete('/cite/delete/{cite}', [CiteController::class, 'destroy'])->name('cite.delete');

// Route Terrain
Route::get('/terrain', [TerrainController::class, 'index'])->name('terrain');
Route::get('/terrain/create', [TerrainController::class, 'create'])->name('terrain.create');
Route::post('/terrain/save', [TerrainController::class, 'store'])->name('terrain.save');
Route::get('/terrain/edit/{terrain}', [TerrainController::class, 'edit'])->name('terrain.edit');
Route::put('/terrain/update/{terrain}', [TerrainController::class, 'update'])->name('terrain.update');
Route::delete('/terrain/delete/{terrain}', [TerrainController::class, 'destroy'])->name('terrain.delete');

// Route Logement
Route::get('/logement', [LogementController::class, 'index'])->name('logement');
Route::get('/logement/create', [LogementController::class, 'create'])->name('logement.create');
Route::post('/logement/save', [LogementController::class, 'store'])->name('logement.save');
Route::get('/logement/edit/{logement}', [LogementController::class, 'edit'])->name('logement.edit');
Route::put('/logement/update/{logement}', [LogementController::class, 'update'])->name('logement.update');
Route::delete('/logement/delete/{logement}', [LogementController::class, 'destroy'])->name('logement.delete');

// Route Achat
Route::get('/achat', [AchatController::class, 'index'])->name('achat');
Route::get('/achat/create', [AchatController::class, 'create'])->name('achat.create');
Route::post('/achat/save', [AchatController::class, 'store'])->name('achat.save');
Route::get('/achat/edit/{achat}', [AchatController::class, 'edit'])->name('achat.edit');
Route::put('/achat/update/{achat}', [AchatController::class, 'update'])->name('achat.update');
Route::delete('/achat/delete/{achat}', [AchatController::class, 'destroy'])->name('achat.delete');

// Chart

