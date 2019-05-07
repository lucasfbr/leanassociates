<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'user_id',
        'cargo',
        'empresa',
        'localidade',
        'de',
        'ate',
        'descricao',
        'link',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
