<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginsController;
use App\Http\Controllers\RegistersController;
use App\Http\Controllers\AgendasController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\ResidentsController;

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

Route::get('/home', [LoginsController::class, 'home'])->name('home'); // Página principal


Route::get('/',                 [LoginsController::class, 'index'])->            name('index'); // Página inicial
Route::post('/submitIndex',     [LoginsController::class, 'submitIndex'])->      name('index.submit'); // Envio do formulário de login

Route::get('/registers',        [RegistersController::class, 'registers'])->       name('registers'); // Página de registro
Route::post('/submitRegisters', [RegistersController::class, 'submitRegisters'])-> name('registers.submit'); // Envio do formulário de registro

Route::get('/residents',        [ResidentsController::class, 'residents'])->       name('residents'); // Página de residentes
Route::post('/submitResidents', [ResidentsController::class, 'submitResidents'])-> name('residents.submit'); // Envio do formulário de residentes

Route::get('/medicines',        [MedicinesController::class, 'medicines'])->       name('medicines'); // Página de medicamentos
Route::post('/submitMedicines', [MedicinesController::class, 'submitMedicines'])-> name('medicines.submit'); // Envio do formulário de medicamentos

Route::get('/agendas', [AgendasController::class, 'agendas'])->name('agendas'); // Página de agenda
Route::post('/submitAgendas', [AgendasController::class, 'submitAgendas'])-> name('agendas.submit'); // Envio do formulário de agenda
Route::get('/agendas/{id}', [AgendasController::class, 'show'])->name('agendas.show'); // Visualizar agenda
Route::get('/agendas/{id}/edit', [AgendasController::class, 'edit'])->name('agendas.edit');
Route::put('/agendas/{id}', [AgendasController::class, 'update'])->name('agendas.update'); // Atualizar agenda
Route::post('/submitAgendas', [AgendasController::class, 'submitAgendas'])->name('agendas.submit'); // Criar nova agenda
