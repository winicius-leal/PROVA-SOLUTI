<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Logs;

class LogoutController extends Controller
{
    private $Logs;

    public function __construct()
    {
        $this->Logs = new Logs();
    }
    public function logout ()
    {
        try {

            Auth::logout();

            $this->Logs->registraLog("info", "encerrou a sessão");

            Session::flush();

            return redirect("/entrar");

        } catch (\Exception $erro) {

            $this->Logs->registraLog("error", $erro->getMessage());

            return redirect()->back()->withErrors("Algo deu errado, tente mais tarde ou entre em contato com o suporte");
        }
       
    }
}
