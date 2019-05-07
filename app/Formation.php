<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'user_id',
        'instituicao',
        'formacao',
        'de',
        'ate',
        'descricao',
        'link',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
