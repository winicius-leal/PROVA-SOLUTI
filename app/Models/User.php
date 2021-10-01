<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Redirect;

class User extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'email',
        'password',
        "pessoa_id"
    ];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function pessoa()
    {
       return $this->belongsTo(Pessoa::class);
    }

    public function validaEmail(String $email)
    {
        return $this->removeCaracteresIlegais($email);

    }
    public function removeCaracteresIlegais(String $email)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        return $this->verificaEmail($email);
    }

    public function verificaEmail(String $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            return Redirect::back()->withErrors(["error"=>"Email inválido!"]);
        }
        return $this->consultaNoBancoEmailRepetido($email);
    }
    public function consultaNoBancoEmailRepetido(String $email)
    {        
        $email = User::where('email', $email)->get();

        if(isset($email[0]))
        {   
            return Redirect::back()->withErrors(["error"=>"Email já cadastrado!"]);
        }
        return;
    }
    
}
