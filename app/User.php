<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN = 0;
    const ROLE_CONSULTOR = 1;
    const ROLE_EMPRESA = 2;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'whatsapp',
        'empresa',
        'interesse',
        'site',
        'cep',
        'uf',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'status',
        'termos',
        'perfil',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
