<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash, Redirect};
use App\Models\{User,Pessoa,CPF,Telefone,Endereco};
use App\Http\Requests\RegistroFormRequest;
use App\Services\{CriarPessoa, Logs};



class RegistroController extends Controller
{
    private $Logs;

    public function __construct()
    {
        $this->Logs = new Logs();
    }

    public function create()
    {
        try {

            return view('registro.create');

        } catch (\Exception $erro) {
            
            $this->Logs->registraLog("error", $erro->getMessage());
            
            return redirect()->back()->withErrors("Algo deu errado, tente mais tarde ou entre em contato com o suporte");
        }
        
    }
    
    public function store( RegistroFormRequest $request)
    {   
        try {
                
            $dadosValidados = $request->validated();

            $service = new CriarPessoa();
            
            $service->criarPessoa($dadosValidados);

            $this->Logs->registraLog("info", "Novo usuario criado ".$dadosValidados["email"]);

            return redirect("/entrar")->with('message', 'Usuario criado com sucesso!');
            
        } catch (\Exception $erro) {

            $this->Logs->registraLog("error", $erro->getMessage());

            return redirect()->back()->withErrors("Algo deu errado, tente mais tarde ou entre em contato com o suporte");
        }
    }
}
