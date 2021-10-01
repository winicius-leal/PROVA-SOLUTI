<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpseclib3\File\X509;
use App\Models\{Pessoa, Certificado};
use App\Services\ImportarCertificado, AtualizarDadosDaSession;

class CertificadoController extends Controller
{
    public function create(Request $request)
    {
        $session = $request->session()->get("pessoa");

        return view("certificado.create",["pessoa"=>$session[0]]);
    }
    
    public function store(Request $request)
    {   

        $session = $request->session()->get("pessoa");

        $service = new ImportarCertificado();

        $return = $service->verificaArquivo($request->certificado);
        
        if (!$return)
        {
            return redirect()->back()->withErrors(['Não é um certificado válido']);
        }

        $certificado = $service->salvarCertificadoNoBanco($request, $session[0]->id);
        
        $upload = $service->importarCertificadoParaServidor($certificado->id, $request->certificado);

        return redirect("/");
        
    }
}
