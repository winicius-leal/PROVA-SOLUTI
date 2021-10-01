<?php
namespace App\Services;

use Illuminate\Http\Request;
use phpseclib3\File\X509;
use App\Models\{Pessoa, Certificado};

class ImportarCertificado
{
    public function verificaArquivo($certificado)
    {
        $x509 = new X509();

        $cert = $x509->loadX509(file_get_contents($certificado));

        return $cert;

    }
    public function salvarCertificadoNoBanco($request, $pessoa_id)
    {   
                
        $x509 = new X509();

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
            "pessoa_id"=>$pessoa_id
        ]);

        AtualizarDadosDaSession::atualizaDadosSession($request);
        
        return $certificado;

    }

    public function importarCertificadoParaServidor($IdCertificado, $arquivo )
    {
        $name = $IdCertificado;
    
            $extension = ".pem";
    
            $nameFile = "{$name}.{$extension}";
    
            $upload = $arquivo->storeAs('certificadoPEM', $nameFile);

            return $upload;
    }
}