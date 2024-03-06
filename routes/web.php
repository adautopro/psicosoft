<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\NotaFiscalController;

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

Route::get('/', function () {
    //return view('welcome');
    return view('home');
});
Route::get('pacientes', [PacienteController::class,'index']);
Route::get('pacientes/sincronizar', [PacienteController::class,'sincronizar']);
Route::get('gerar-notas',[NotaFiscalController::class,'gerar']);
