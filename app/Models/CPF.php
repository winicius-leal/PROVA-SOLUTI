<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;

class CPF extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ["numero","pessoa_id"];


    public function validaCpf(String $cpf)
    {
        $cpf = $this->removeCaracteresEspeciais($cpf);
    }
    public function removeCaracteresEspeciais($cpf)
    {
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        $this->verificaQuantidaDeDeDigitos($cpf);
    }
    public function verificaQuantidaDeDeDigitos($cpf)
    {
        if (strlen($cpf) != 11) 
        {
            return Redirect::back()->withErrors(["error"=>"Quantidade de Digitos inválido!"]);
        }

        $this->verificaSequenciaDeDigitosRepetidos($cpf);
    }

    public function verificaSequenciaDeDigitosRepetidos($cpf)
    {
        if (preg_match('/(\d)\1{10}/', $cpf)) 
        {
            return Redirect::back()->withErrors(["error"=>"CPF inválido!"]);
        }

        $this->consultaNoBancoCpfRepetido($cpf);
    }
    public function consultaNoBancoCpfRepetido($cpf)
    {
        $cpf = CPF::where('numero', 22222222222)->get();

        if(isset($cpf))
        {
            //return redirect("/entrar");
            return Redirect::back()->withErrors(["error"=>"CPF inválido!"]);
        }
        var_dump($cpf);
        exit;
    }

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
}
