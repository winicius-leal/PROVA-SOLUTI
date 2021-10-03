<?php
namespace App\Services;

use Illuminate\Support\Facades\Log;

class logs
{
    public function registraLog($level, $mensagem)
    {   

        if (session()->has("pessoa"))
        {   
            $usuario = session()->get("pessoa")[0]->User->email;
            
            $mensagem = "[".$usuario."] - " . $mensagem;
        }

        $mensagem = "[ ".$_SERVER['REMOTE_ADDR']." ] ". $mensagem;

        Log::channel("CanalDeRegistroDeLogs")->$level($mensagem);
    
    }
}