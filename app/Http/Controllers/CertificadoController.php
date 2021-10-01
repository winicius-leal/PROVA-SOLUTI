<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpseclib3\File\X509;
use App\Models\{Pessoa, Certificado};

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

        if ($request->hasFile('certificado') && $request->file('certificado')->isValid()) {
            
            $x509 = new X509();
            //$cert = $x509->loadX509(file_get_contents(storage_path('app/certificadoPEM/').'0104372021093061550d256ed06.pem'));
            $cert = $x509->loadX509(file_get_contents($request->certificado));
            $dn = $x509->getDN(X509::DN_STRING);
            $issuerDN = $x509->getIssuerDN(X509::DN_STRING);
            $naoAntesDe = $cert["tbsCertificate"]["validity"]["notBefore"]["utcTime"];
            $naoDepoisDe = $cert["tbsCertificate"]["validity"]["notAfter"]["utcTime"];

            $certificado = Certificado::create([
                "dn"=>$dn,
                "issuerDn"=>$issuerDN,
                "notBefore"=>$naoAntesDe,
                "notAfter"=>$naoDepoisDe,
                "pessoa_id"=>$session[0]->id
            ]);
            
            $name = $certificado->id;
    
            $extension = ".pem";
    
            $nameFile = "{$name}.{$extension}";
    
            $upload = $request->certificado->storeAs('certificadoPEM', $nameFile);

            if (!$upload ){
                return redirect()->back()->with('error', 'Falha ao fazer upload')->withInput();
            }

            return redirect("/");

    
        }

        return redirect()->back()->with('error', 'Arquivo inválido !')->withInput();
    }
}
