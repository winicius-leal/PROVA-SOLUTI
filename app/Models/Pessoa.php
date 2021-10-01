<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
  
    public  $timestamps = false;
    protected $table = "pessoas";//ORM 
    protected $fillable = ["nome", "dataNascimento","user_id"];

    public function Endereco()
    {
        return $this->hasOne(Endereco::class);
    }

    public function Telefone()
    {
        return $this->hasOne(Telefone::class);
    }

    public function CPF()
    {
        return $this->hasOne(CPF::class, "pessoa_id");
    }

    public function Certificados()
    {
        return $this->hasMany(Certificado::class, "pessoa_id");
    }

    public function Usuario()
    {
        return $this->hasOne(Usuario::class);
    }

    public function User()
    {
        return $this->hasOne(User::class);
    }

}
