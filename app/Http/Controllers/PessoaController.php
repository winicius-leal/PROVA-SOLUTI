<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Pessoa,CPF,Telefone,Endereco};
use App\Http\Requests\PessoaFormRequest;
use Illuminate\Support\Facades\Auth;

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
        $request->validate();

        $nome = $request->nome;
        $dataNascimento = $request->dataNascimento;
        $cpf = $request->cpf;
        $tell = $request->telefone;
        $ddd = $request->ddd;
        $rua = $request->rua;
        $numero = $request->numero;
        $bairro = $request->bairro;
        $cidade = $request->cidade;
        $estado = $request->estado;

        //var_dump($request->all());
        echo"s";
        exit;

        $pessoa = Pessoa::create([
            "nome"=>$nome,
            "dataNascimento"=>$dataNascimento
        ]);

        CPF::create([
            "numero"=>$cpf,
            "pessoa_id"=>$pessoa->id
        ]);

        $telelefone = Telefone::create([
            "ddd"=>$ddd,
            "numero"=>$tell,
            "pessoa_id"=>$pessoa->id
        ]);

        $endereco = Endereco::create([
            "rua"=>$rua,
            "numero"=>$numero,
            "bairro"=>$bairro,
            "cidade"=>$cidade,
            "estado"=>$estado,
            "pessoa_id"=>$pessoa->id
        ]);

        $request->session()->put("pessoa", $pessoa);

        return redirect("/");
        
    }

}
