<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Pessoa, Certificado};
use App\Services\{ImportarCertificado, Logs, AtualizarDadosDaSession};
use App\Http\Requests\CertificadoFormRequest;

class CertificadoController extends Controller
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

            return view("certificado.create",["pessoa"=>$session[0]]);

        } catch (\Exception $erro) {

            $this->Logs->registraLog("error", $erro->getMessage());

            return redirect()->back()->withErrors("Algo deu errado, tente mais tarde ou entre em contato com o suporte");
        }
       
    }
    
    public function store(CertificadoFormRequest $request)
    {   
        try {

            $request->validated($request->certificado);

            $session = $request->session()->get("pessoa");
    
            $service = new ImportarCertificado();
    
            if(!$service->validaArquivo($request->certificado))
            {
                return redirect()->back()->withErrors(['Não é um certificado válido']);
            }
    
            $certificadoSalvo = $service->salvarCertificadoNoBanco($session[0]->id);
            
            $service->importarCertificadoParaServidor($request->certificado, $certificadoSalvo->id);
            
            $this->Logs->registraLog("info"," Importou um certificado de ID: ".$certificadoSalvo->id );

            AtualizarDadosDaSession::atualizaDadosSession($request);
    
            return redirect("/");

        } catch (\Exception $erro) {

            $this->Logs->registraLog("error", $erro->getMessage());

            return redirect()->back()->withErrors("Algo deu errado, tente mais tarde ou entre em contato com o suporte");
        }

    }
}
