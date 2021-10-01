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

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function validaCpf(String $cpf)
    {   
        return $this->removeCaracteresEspeciais($cpf);
    }
    public function removeCaracteresEspeciais($cpf)
    {
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        return $this->verificaQuantidaDeDeDigitos($cpf);
    }
    public function verificaQuantidaDeDeDigitos($cpf)
    {
        if (strlen($cpf) != 11 || empty($cpf)) 
        {
            return Redirect::back()->withErrors(["error"=>"Tamanho do CPF inválido!"]);
        }
                
        return $this->verificaSequenciaDeDigitosRepetidos($cpf);
    }

    public function verificaSequenciaDeDigitosRepetidos($cpf)
    {
        if (preg_match('/(\d)\1{10}/', $cpf)) 
        {
            return Redirect::back()->withErrors(["error"=>"CPF com números em sequência !"]);
        }

        return $this->consultaNoBancoCpfRepetido($cpf);
    }

    public function consultaNoBancoCpfRepetido($cpf)
    {
        $cpf = CPF::where('numero', $cpf)->get();

        if(isset($cpf[0]))
        {   
            return Redirect::back()->withErrors(["error"=>"CPF já cadastrado!"]);
        }
        return;
    }


}
