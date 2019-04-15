<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagen extends Model
{
    protected $fillable = [
        'titulo','empresa','site','nome','email','telefone','celular','mensagem'
    ];
}
