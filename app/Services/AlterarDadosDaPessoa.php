<?php
namespace App\Services;
use App\Models\{Pessoa,CPF,Telefone,Endereco};
use App\Services\AtualizarDadosDaSession;

class AlterarDadosDaPessoa
{
    public function alterarPessoa($dados, $pessoa_id, $request)
    {   

        $CPF = CPF::where("pessoa_id", $pessoa_id)->get();
        $CPF = $CPF[0];
        $CPF->numero = $dados["cpf"];
        $CPF->save();

        $Endereco = Endereco::where("pessoa_id", $pessoa_id)->get();
        $Endereco = $Endereco[0];
        $Endereco->rua =$dados["rua"];
        $Endereco->numero = $dados["numero"];
        $Endereco->bairro = $dados["bairro"];
        $Endereco->cidade = $dados["cidade"];
        $Endereco->estado = $dados["estado"];
        $Endereco->save();

        $Telefone = Telefone::where("pessoa_id", $pessoa_id)->get();
        $Telefone = $Telefone[0];
        $Telefone->ddd = $dados["ddd"];
        $Telefone->numero = $dados["telefone"];
        $Telefone->save();

        $Pessoa = Pessoa::where("id", $pessoa_id)->get();
        $Pessoa = $Pessoa[0];
        $Pessoa->nome = $dados["nome"];
        $Pessoa->dataNascimento = $dados["dataNascimento"];
        $Pessoa->save();

        AtualizarDadosDaSession::atualizaDadosSession($request);

        return true;
    }
}