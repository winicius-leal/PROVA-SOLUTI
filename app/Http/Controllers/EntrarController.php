<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pessoa;


class EntrarController extends Controller
{
    public function index()
    {
        return view("login.entrar");
    }

    public function entrar(Request $request)
    {  

        if(!Auth::attempt($request->only(["email", "password"])))
        {
            
            return redirect()->back()->withErrors("Usuario ou senha inválidos!");
        }

        $usuario = Auth::user();
        
        $pessoa = Pessoa::with("CPF","Endereco","Telefone","Certificado","User")->where("id", $usuario->pessoa_id)->get();
        
        $request->session()->put('pessoa', $pessoa);
        return redirect("/");
    }
}
