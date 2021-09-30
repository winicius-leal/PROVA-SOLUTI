<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ["dn","issuerDn","notBefore","notAfter","pessoa_id"];

    public function Pessoa()
    {
        $this->belongsTo(Pessoa::class);
    }
}
