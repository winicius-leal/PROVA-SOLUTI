<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Pessoa,Telefone,Endereco,CPF, User};
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request){

        $session = $request->session()->get("pessoa");

        $certificados = $session[0]->Certificados;

        foreach ($certificados as $certificado) {
            //echo $certificado->dn;
        }
       
        //exit;
        return view("dashboard.index", ["pessoa"=>$session[0]]);        
    }

}