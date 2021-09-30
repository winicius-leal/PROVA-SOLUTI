<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\{Usuario,User,Pessoa,CPF,Telefone,Endereco};


class RegistroController extends Controller
{
    public function create()
    {
        return view('registro.create');
    }

    public function store(Request $request)
    {   
        $cpf = new CPF();
        echo $cpf->validaCpf($request->CPF);

        var_dump($request->all());
        exit;
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
