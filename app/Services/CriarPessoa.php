<?php
namespace App\Services;
use App\Models\{Pessoa,CPF,Telefone,Endereco};

class CriarPessoa
{
    public function criarPessoa($pessoa)
    {   

        $pessoa = $pessoa[0];

        $CPF = new CPF();
        $CPF->numero = $pessoa->CPF->numero;
        $CPF->pessoa_id = $pessoa->id;
        $CPF->save();

        $Endereco = new Endereco();
        $Endereco->rua = $pessoa->Endereco->rua;
        $Endereco->numero = $pessoa->Endereco->numero;
        $Endereco->bairro = $pessoa->Endereco->bairro;
        $Endereco->cidade = $pessoa->Endereco->cidade;
        $Endereco->estado = $pessoa->Endereco->estado;
        $Endereco->pessoa_id = $pessoa->id;
        $Endereco->save();

        $Telefone = new Telefone();
        $Telefone->ddd = $pessoa->Telefone->ddd;
        $Telefone->numero = $pessoa->Telefone->numero;
        $Telefone->pessoa_id = $pessoa->id;
        $Telefone->save();

        $Pessoa = new Pessoa();
        $Pessoa->nome = $pessoa->nome;
        $Pessoa->dataNascimento = $pessoa->dataNascimento;
        $Pessoa->user_id = $pessoa->user_id;
        $Pessoa->id = $pessoa->id;
        $Pessoa->save();

        return;
    }
}