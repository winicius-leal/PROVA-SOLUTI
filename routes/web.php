<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController, 
    PessoaController, 
    LoginController, 
    RegistroController, 
    CertificadoController,
    LogoutController
};

Route::get('/', [HomeController::class, 'index'])->middleware("auth");

Route::get('/logout', [LogoutController::class, 'logout'])->middleware("auth");

Route::get('/pessoa/alterar', [PessoaController::class, 'create'])->middleware("auth");
Route::post('/pessoa/alterar/{id}', [PessoaController::class, 'store'])->middleware("auth");

Route::get('/entrar', [LoginController::class, 'index'])->name("entrar");
Route::post('/entrar', [LoginController::class, 'entrar']);

Route::get('/registrar', [RegistroController::class, 'create'])->name("registrar");
Route::post('/registrar', [RegistroController::class, 'store']);

Route::get('/certificado/importar', [CertificadoController::class, 'create'])->middleware("auth");
Route::post('/certificado/importar', [CertificadoController::class, 'store'])->middleware("auth");
