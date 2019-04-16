<?php

namespace App\Observers;

use App\Servico;
use App\Observers\Utils\UploadTrait;

class ServicoObserver
{
    use UploadTrait;

    protected $field = 'img';
    protected $path = 'img';

    public function creating(Servico $model)
    {
        //dd($model->titulo);
        //$model->titulo = 'teste2';
        $this->createFile($model);
    }
    public function deleting(Servico $model)
    {
        $this->removeFile($model->img);
    }
    public function updating(Servico $model)
    {
        $this->updateFile($model);
    }
}