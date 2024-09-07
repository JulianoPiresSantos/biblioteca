<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\AssuntoController;
use App\Http\Controllers\RelatorioController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('livros', LivroController::class);
Route::resource('autores', AutorController::class)->parameters([
    'autores' => 'autor'
]);
Route::resource('assuntos', AssuntoController::class);
Route::get('/relatorio/livros', [RelatorioController::class, 'generateReport'])->name('relatorios.livros');

