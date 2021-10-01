<?php
namespace App\Services;
use App\Models\{Pessoa,CPF,Telefone,Endereco, User};
use Illuminate\Support\Facades\Hash;

class CriarPessoa
{
    public function criarPessoa($request)
    {   
        $request->password = Hash::make($request->password);
    
        $pessoa = Pessoa::create([
            "nome"=>$request->name,
            "dataNascimento"=>$request->DataNascimento,
        ]);

        $usuario = User::create([
            "email"=>$request->email,
            "password"=>$request->password,
            "pessoa_id"=>$pessoa->id
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

        return $usuario;
    }
}