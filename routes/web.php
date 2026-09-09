<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RouletteController;
use App\Http\Controllers\RiwayatController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/bab/{id}', [HomeController::class, 'show'])->name('bab.show');
Route::post('/roulette/start', [RouletteController::class, 'start'])->name('roulette.start');
Route::get('/roulette', [RouletteController::class, 'show'])->name('roulette.show');
Route::post('/roulette/jawab', [RouletteController::class, 'jawab'])->name('roulette.jawab');
Route::get('/koreksi', [RouletteController::class, 'koreksi'])->name('roulette.koreksi');
Route::get('/menyerah', [RouletteController::class, 'menyerah'])->name('roulette.menyerah');
Route::get('/hasil', [RouletteController::class, 'hasil'])->name('roulette.hasil');
Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
Route::get('/riwayat/{id}', [RiwayatController::class, 'show'])->name('riwayat.show');
Route::delete('/riwayat/{id}', [RiwayatController::class, 'destroy'])->name('riwayat.destroy');