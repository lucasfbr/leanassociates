<?php

namespace App\Observers;

use App\Header;
use App\Observers\Utils\UploadMultipleImgTrait;

class HeaderObserver
{
    use UploadMultipleImgTrait;

    protected $field = ['logo','banner'];
    protected $path = 'img';

    public function creating(Header $model)
    {
        //dd($model->titulo);
        //$model->titulo = 'teste2';
        $this->createFile($model);
    }
    public function deleting(Header $model)
    {
        $this->removeFile($model->logo, $model->banner);
    }
    public function updating(Header $model)
    {
        $this->updateFile($model);
    }
}