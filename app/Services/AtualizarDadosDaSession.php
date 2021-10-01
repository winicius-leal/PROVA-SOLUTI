<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\Pessoa;

class AtualizarDadosDaSession
{
    public static function atualizaDadosSession($request)
    {
        $usuario = Auth::user();
        
        $pessoa = Pessoa::with("CPF","Endereco","Telefone","Certificados","User")->where("id", $usuario->pessoa_id)->get();
        
        $request->session()->put('pessoa', $pessoa);
    }
}