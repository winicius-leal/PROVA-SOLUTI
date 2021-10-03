<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth};
use App\Models\Pessoa;
use App\Services\{AtualizarDadosDaSession, Logs};

class LoginController extends Controller
{
    
    private $Logs;

    public function __construct()
    {
        $this->Logs = new Logs();
    }

    public function index()
    {
        try{

            return view("login.entrar");

        } catch (\Exception $erro) {

            $this->Logs->registraLog("error", $erro->getMessage());

            return $erro->getMessage();
        }
        
    }

    public function entrar(Request $request)
    {  
        try {

            if(!Auth::attempt($request->only(["email", "password"])))
            {
                $this->Logs->registraLog("info", "tentativa de logon incorreta com : ".$request->email);
                return redirect()->back()->withErrors("Usuario ou senha inválidos!");
            }

            AtualizarDadosDaSession::atualizaDadosSession($request);

            $this->Logs->registraLog("info", "Realizou autenticação");

            return redirect("/certificado/importar");
            
        } catch (\Exception $erro) {

            $this->Logs->registraLog("warning", $erro->getMessage());

            return redirect()->back()->withErrors("Algo deu errado, tente mais tarde ou entre em contato com o suporte");
        }
        
        
    }
}
