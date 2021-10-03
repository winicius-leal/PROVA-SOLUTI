<?php
namespace App\Services;
use App\Models\{Pessoa,CPF,Telefone,Endereco, User};
use Illuminate\Support\Facades\Hash;

class CriarPessoa
{
    public function criarPessoa(Array $dadosValidados)
    {   

        $dadosValidados["password"] = Hash::make($dadosValidados["password"]);

        $pessoa = Pessoa::create([
            "nome"=>$dadosValidados["name"],
            "dataNascimento"=>$dadosValidados["DataNascimento"],
        ]);

        $usuario = User::create([
            "email"=>$dadosValidados["email"],
            "password"=>$dadosValidados["password"],
            "pessoa_id"=>$pessoa->id
        ]);

        CPF::create([
            "numero"=>$dadosValidados["CPF"],
            "pessoa_id"=>$pessoa->id
        ]);

        Telefone::create([
            "ddd"=>$dadosValidados["ddd"],
            "numero"=>$dadosValidados["telefone"],
            "pessoa_id"=>$pessoa->id
        ]);

        Endereco::create([
            "rua"=>$dadosValidados["rua"],
            "numero"=>$dadosValidados["numero"],
            "bairro"=>$dadosValidados["bairro"],
            "cidade"=>$dadosValidados["cidade"],
            "estado"=>$dadosValidados["estado"],
            "pessoa_id"=>$pessoa->id
        ]);

        return $usuario;
    }
}