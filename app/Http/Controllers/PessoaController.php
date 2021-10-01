<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Pessoa,CPF,Telefone,Endereco};
use App\Http\Requests\PessoaFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\{CriarPessoa};

class PessoaController extends Controller
{
    public function create()
    {   
        $usuario = Auth::user();
        $pessoa = Pessoa::with("CPF","Endereco","Telefone","Certificado","Usuario")->where("user_id", $usuario->id)->get();

        return view("dashboard.create", ["pessoa"=>$pessoa[0]]);
    }

    public function store(PessoaFormRequest $request)
    {

        $request->validated($request->all());
        
        $pessoa = Pessoa::with("CPF","Endereco","Telefone","Certificado","Usuario")->where("user_id", $request->id)->get();
   
        $service = new CriarPessoa();
       
        $service->criarPessoa($pessoa);
        
        return redirect("/");
        
    }

}
