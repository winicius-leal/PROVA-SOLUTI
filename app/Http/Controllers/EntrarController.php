<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
            //route index
            return redirect()->back()->withErrors("Usuario ou senha inválidos!");
        }

        return redirect("/");
    }
}
