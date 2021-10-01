<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\{User,Pessoa,CPF,Telefone,Endereco};
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RegistroFormRequest;
use App\Services\CriarPessoa;



class RegistroController extends Controller
{
    public function create()
    {
        return view('registro.create');
    }

    public function store(RegistroFormRequest $request)
    {   

        $validator = $request->validated();

        $email = new User();

        $retornoEmail = $email->validaEmail($request->email);
        
        if(isset($retornoEmail))
        {    
            return $retornoEmail;
        }

        $cpf = new CPF();

        $retornoCpf = $cpf->validaCpf($request->CPF);
        
        if(isset($retornoCpf))
        {    
            return $retornoCpf;
        }

        $service = new CriarPessoa();
        
        $usuario = $service->criarPessoa($request);

        return redirect("/entrar")->with('message', 'Usuario criado com sucesso!');
        
    }
}
