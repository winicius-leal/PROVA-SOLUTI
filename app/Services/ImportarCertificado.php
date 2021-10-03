<?php
namespace App\Services;

use Illuminate\Http\Request;
use phpseclib3\File\X509;
use App\Models\{Certificado};

class ImportarCertificado
{
    private $X509;
    private $certificado;

    public function __construct()
    {
        $this->X509 = new X509();
    }

    public function validaArquivo($certificado)
    {
        
        $certificadoCarregado = $this->X509->loadX509(file_get_contents($certificado));

        if (!$certificadoCarregado) {

            return;

        }

        $this->certificado = $certificadoCarregado;

        return true;

    }

    public function salvarCertificadoNoBanco($pessoa_id)
    {   
        $dn = $this->X509->getDN(X509::DN_STRING);

        $issuerDN = $this->X509->getIssuerDN(X509::DN_STRING);
        
        $naoAntesDe = $this->certificado["tbsCertificate"]["validity"]["notBefore"]["utcTime"];
        
        $naoDepoisDe = $this->certificado["tbsCertificate"]["validity"]["notAfter"]["utcTime"];

        $certificadoSalvo = Certificado::create([
            "dn"=>$dn,
            "issuerDn"=>$issuerDN,
            "notBefore"=>$naoAntesDe,
            "notAfter"=>$naoDepoisDe,
            "pessoa_id"=>$pessoa_id
        ]);

        return $certificadoSalvo;

    }

    public function importarCertificadoParaServidor($certificado, $idCertificado)
    {
        $name = $idCertificado;
    
            $extension = ".pem";
    
            $nameFile = "{$name}.{$extension}";
    
            $upload = $certificado->storeAs('certificadoPEM', $nameFile);

            return $upload;
    }
}