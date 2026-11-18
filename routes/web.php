<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicoController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/dashboard', fn () => redirect()->route('home'))->name('dashboard');

    Route::get('agendamento/calendario', [AgendamentoController::class, 'calendario'])->name('agendamento.calendario');
    Route::get('agendamento/eventos', [AgendamentoController::class, 'eventos'])->name('agendamento.eventos');

    Route::resource('cliente', ClienteController::class);
    Route::resource('moto', MotoController::class);
    Route::resource('servico', ServicoController::class);
    Route::resource('agendamento', AgendamentoController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';