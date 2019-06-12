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

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
