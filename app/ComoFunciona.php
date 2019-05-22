<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComoFunciona extends Model
{
    protected $fillable = [
        'user_id','titulo','texto','titulo_resumo','resumo','img'
    ];

    protected $table = 'comoFunciona';
}
