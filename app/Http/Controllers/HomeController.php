<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Pessoa,Telefone,Endereco,CPF, User};
use Illuminate\Support\Facades\Auth;
use App\Services\{Logs};

class HomeController extends Controller
{
    private $Logs;

    public function __construct()
    {
        $this->Logs = new Logs();
    }
    public function index(Request $request){
        
        try {

            $session = $request->session()->get("pessoa");

            return view("dashboard.index", ["pessoa"=>$session[0]]);  

        } catch (\Exception $erro) {

            $this->Logs->registraLog("error", $erro->getMessage());

            return redirect()->back()->withErrors("Algo deu errado, tente mais tarde ou entre em contato com o suporte");
        }
        
    }

}