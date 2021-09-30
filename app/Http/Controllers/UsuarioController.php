<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Pessoa,Telefone,Endereco,CPF};
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index(Request $request){

        $usuario = Auth::user();
        $pessoa = Pessoa::with("CPF","Endereco","Telefone","Certificado","Usuario")->where("user_id", $usuario->id)->get();

        return view("dashboard.index", ["pessoa"=>$pessoa[0]]);        
    }

}