<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Pessoa,CPF,Telefone,Endereco, User};
use App\Http\Requests\PessoaFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\{AlterarDadosDaPessoa, AtualizarDadosDaSession};

class PessoaController extends Controller
{
    public function create(Request $request)
    {   

        $session = $request->session()->get("pessoa");

        return view("dashboard.create", ["pessoa"=>$session[0]]);
    }

    public function store(PessoaFormRequest $request)
    {

        $request->validated($request->all());
        
        $usuario = Auth::user();

        $service = new AlterarDadosDaPessoa();
       
        return $service->alterarPessoa($request->all(), $usuario->pessoa_id, $request);

        //AtualizarDadosDaSession::atualizaDadosSession($request);
        
        //return $retorno;
        
        
    }

}
