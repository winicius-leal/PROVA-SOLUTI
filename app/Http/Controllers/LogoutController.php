<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout ()
    {
        Auth::logout();
        Session::flush();
        return redirect("/entrar");
    }
}
