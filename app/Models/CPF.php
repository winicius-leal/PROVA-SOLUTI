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

}
