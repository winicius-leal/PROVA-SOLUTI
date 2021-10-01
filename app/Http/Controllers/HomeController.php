<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Pessoa,Telefone,Endereco,CPF, User};
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request){

        $usuario = Auth::user();
        $pessoa = Pessoa::with("CPF","Endereco","Telefone","Certificado","User")->where("id", $usuario->pessoa_id)->get();

        return view("dashboard.index", ["pessoa"=>$pessoa[0]]);        
    }

}