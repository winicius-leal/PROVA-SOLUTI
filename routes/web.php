<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController, 
    PessoaController, 
    EntrarController, 
    RegistroController, 
    CertificadoController,
    LogoutController
};
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [HomeController::class, 'index'])->middleware("auth");

Route::get('/logout', [LogoutController::class, 'logout'])->middleware("auth");

Route::get('/pessoa/alterar', [PessoaController::class, 'create'])->middleware("auth");
Route::post('/pessoa/alter/{id}', [PessoaController::class, 'store'])->middleware("auth");

Route::get('/entrar', [EntrarController::class, 'index'])->name("entrar");
Route::post('/entrar', [EntrarController::class, 'entrar']);

Route::get('/register', [RegistroController::class, 'create'])->name("registrar");
Route::post('/register', [RegistroController::class, 'store']);

Route::get('/certificado/import', [CertificadoController::class, 'create'])->middleware("auth");
Route::post('/certificado/import', [CertificadoController::class, 'store'])->middleware("auth");
