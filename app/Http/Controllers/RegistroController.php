<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\{Usuario,User,Pessoa,CPF,Telefone,Endereco};
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RegistroFormRequest;



class RegistroController extends Controller
{
    public function create()
    {
        return view('registro.create');
    }

    public function store(RegistroFormRequest $request)
    {   

        $request->validated();

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

        $request->password = Hash::make($request->password);
    
        $user = User::create([
            "email"=>$request->email,
            "password"=>$request->password
        ]);

        $pessoa = Pessoa::create([
            "nome"=>$request->name,
            "dataNascimento"=>$request->DataNascimento,
            "user_id"=>$user->id
        ]);

        CPF::create([
            "numero"=>$request->CPF,
            "pessoa_id"=>$pessoa->id
        ]);

        Telefone::create([
            "ddd"=>$request->ddd,
            "numero"=>$request->telefone,
            "pessoa_id"=>$pessoa->id
        ]);

        Endereco::create([
            "rua"=>$request->rua,
            "numero"=>$request->numero,
            "bairro"=>$request->bairro,
            "cidade"=>$request->cidade,
            "estado"=>$request->estado,
            "pessoa_id"=>$pessoa->id
        ]);

        Auth::login($user);

        return redirect("/");
        
    }
}
