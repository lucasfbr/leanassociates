<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'content_service_id',
        'nome',
        'descricao',
        'valores',
    ];

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function contentServico(){
        return $this->hasOne(ContentServico::class);
    }
}
