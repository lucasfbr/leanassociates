<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'empresa',
        'cnpj',
        'fone',
        'whatsapp',
        'site',
        'interesse',
        'cep',
        'uf',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'status',
        'termos',
        'perfil',
        'foto',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
