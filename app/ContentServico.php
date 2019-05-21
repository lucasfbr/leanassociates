<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentServico extends Model
{
     protected $fillable = [
        'servico_id','titulo','descricao','img'
    ];

     public function servico(){
        return $this->belongsTo(Servico::class);
    }
}
