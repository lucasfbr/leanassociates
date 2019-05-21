<?php

namespace App\Observers;

use App\ContentServico;
use App\Observers\Utils\UploadTrait;

class ServicoObserver
{
    use UploadTrait;

    protected $field = 'img';
    protected $path = 'img';

    public function creating(ContentServico $model)
    {
        //dd($model->titulo);
        //$model->titulo = 'teste2';
        $this->createFile($model);
    }
    public function deleting(ContentServico $model)
    {
        $this->removeFile($model->img);
    }
    public function updating(ContentServico $model)
    {
        $this->updateFile($model);
    }
}