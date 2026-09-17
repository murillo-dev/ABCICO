<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\StatutesController;
use App\Http\Controllers\MembersController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('la-asociacion')->name('association.')->group(function () {
    Route::get('/', [AssociationController::class, 'overview'])->name('overview');
    Route::get('/historia', [AssociationController::class, 'history'])->name('history');
    Route::get('/quienes-somos', [AssociationController::class, 'whoWeAre'])->name('who-we-are');
    Route::get('/mision', [AssociationController::class, 'mission'])->name('mission');
    Route::get('/vision', [AssociationController::class, 'vision'])->name('vision');
    Route::get('/objetivos', [AssociationController::class, 'objectives'])->name('objectives');
    Route::get('/junta-directiva', [AssociationController::class, 'board'])->name('board');
});

Route::prefix('estatutos')->name('statutes.')->group(function () {
    Route::get('/', [StatutesController::class, 'index'])->name('index');
    Route::get('/{statute:slug}', [StatutesController::class, 'show'])->name('show');
    Route::get('/denominacion', [StatutesController::class, 'denomination'])->name('denomination');
    Route::get('/objeto', [StatutesController::class, 'object'])->name('object');
    Route::get('/categoria-de-miembros', [StatutesController::class, 'categories'])->name('categories');
    Route::get('/directiva', [StatutesController::class, 'directiva'])->name('directiva');
});

Route::prefix('miembros')->name('members.')->group(function () {
    Route::get('/', [MembersController::class, 'index'])->name('index');
    Route::get('/hacete-miembro', [MembersController::class, 'become'])->name('become');
    Route::post('/', [MembersController::class, 'store'])->name('store');
});
