<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Pessoa,CPF,Telefone,Endereco, User};
use App\Http\Requests\PessoaFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\{AlterarDadosDaPessoa, AtualizarDadosDaSession, Logs};

class PessoaController extends Controller
{
    private $Logs;

    public function __construct()
    {
        $this->Logs = new Logs();
    }

    public function create(Request $request)
    {   
        try {

            $session = $request->session()->get("pessoa");

            return view("dashboard.create", ["pessoa"=>$session[0]]);

        } catch (\Exception $erro) {

            $this->Logs->registraLog("error", $erro->getMessage());

            return redirect()->back()->withErrors("Algo deu errado, tente mais tarde ou entre em contato com o suporte");
        }
        
    }

    public function store(PessoaFormRequest $request)
    {   
        try {
            
            $request->validated($request->all());
        
            $usuario = Auth::user();

            $service = new AlterarDadosDaPessoa();
           
            if($service->alterarPessoa($request->all(), $usuario->pessoa_id, $request))
            {   
                $this->Logs->registraLog("info", "Alterou dados pessoais");

                return redirect()->back()->with('message', 'Dados alterados com sucesso!');
            }

        } catch (\Exception $erro) {

            $this->Logs->registraLog("error", $erro->getMessage());

            return redirect()->back()->withErrors("Algo deu errado, tente mais tarde ou entre em contato com o suporte");
        }
       
    }

}
