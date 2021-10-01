<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Pessoa,Telefone,Endereco,CPF, User};
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request){

        $session = $request->session()->get("pessoa");

        return view("dashboard.index", ["pessoa"=>$session[0]]);        
    }

}