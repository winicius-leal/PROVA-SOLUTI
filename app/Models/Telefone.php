<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    public $table = "telefones";
    public $timestamps = false;
    protected $fillable = ["ddd","numero","pessoa_id"];

    public function pessoa()
    {
       return $this->belongsTo(Pessoa::class);
    }
}
