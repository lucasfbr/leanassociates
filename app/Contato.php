<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{

    protected $fillable = [
        'nome','empresa','email','telefone','mensagem'
    ];
}
