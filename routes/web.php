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
    return view('index');

});
Route::get('artigos', function () {
    //return view('welcome');
    return view('site.artigos');

});
Route::get('home', function () {
    //return view('welcome');
    return view('dashboard');
});
route::middleware(['auth'])->group( function(){
    Route::get('/admin', function () {
        //return view('welcome');
        return view('admin');
    });
    Route::prefix('pacientes')->group(function(){
        Route::get('/', [PacienteController::class,'index']);
        Route::get('sincronizar', [PacienteController::class,'sincronizar']);
        Route::get('search/{keyword}',[PacienteController::class,'search']);
        Route::get('cadastrar', [PacienteController::class,'create']);
        Route::post('cadastrar', [PacienteController::class,'store']);
        Route::get('alterar/{id}', [PacienteController::class,'edit']);
        Route::post('alterar/{id}', [PacienteController::class,'update']);
    });

    Route::prefix('notas')->group(function(){
        Route::get('/',[NotaFiscalController::class,'index']);
        Route::get('importar/{mes}/{ano}/{nota}',[NotaFiscalController::class,'importarNotion']);
        Route::get('exportar/{ids}',[NotaFiscalController::class,'gerarArquivo']);
        Route::get('cadastrar',[NotaFiscalController::class,'create']);
        Route::post('cadastrar',[NotaFiscalController::class,'store']);
        Route::get('alterar/{id}',[NotaFiscalController::class,'edit']);
        Route::post('alterar/{id}',[NotaFiscalController::class,'update']);
        Route::get('processar-retorno',[NotaFiscalController::class,'processarRetorno']);
    });
});
