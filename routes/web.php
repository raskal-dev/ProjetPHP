<?php

use App\Http\Controllers\AgenceController;
use App\Http\Controllers\CiteController;
use App\Http\Controllers\HomeController;
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

Route::get('/agence', [AgenceController::class, 'index'])->name('agence');
Route::get('/agence/create', [AgenceController::class, 'create'])->name('agence.create');
Route::post('/agence/save', [AgenceController::class, 'store'])->name('agence.save');
Route::get('/agence/edit/{agence}', [AgenceController::class, 'edit'])->name('agence.edit');
Route::put('/agence/update/{agence}', [AgenceController::class, 'update'])->name('agence.update');
Route::delete('/agence/delete/{agence}', [AgenceController::class, 'destroy'])->name('agence.delete');

Route::get('/cite', [CiteController::class, 'index'])->name('cite');


