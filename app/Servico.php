<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = [
        'title','content'
    ];

     public function contentServico(){
        return $this->hasMany(ContentServico::class);
    }
}
