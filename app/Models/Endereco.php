<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

    protected $table = "enderecos";
    public $timestamps = false;
    protected $fillable = [
        "rua",
        "numero",
        "bairro",
        "cidade",
        "estado",
        "pessoa_id"
    ];

    public function pessoa()
    {
       return $this->belongsTo(Pessoa::class);
    }
}
