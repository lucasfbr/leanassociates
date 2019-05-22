<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentServico extends Model
{
     protected $fillable = [
        'titulo','descricao','img'
    ];

     public function servico(){
        return $this->belongsTo(Servico::class);
    }
}
