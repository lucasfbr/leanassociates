<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComoFunciona extends Model
{
    protected $fillable = [
        'user_id','titulo','resumo','texto','descricao','img'
    ];

    protected $table = 'comoFunciona';
}
