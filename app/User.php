<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $table = 'users';
    
    protected $fillable = [
        'name', 'email', 'password', 'tipo', 'rg', 'cpf', 'user_endereco'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function endereco()
    {
        return $this->belongsTo('App\Enderecos', 'user_endereco');
    }
}
