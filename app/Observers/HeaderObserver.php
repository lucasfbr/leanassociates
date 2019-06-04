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
        $this->createFile($model);
    }
    public function deleting(Header $model)
    {
        foreach ($this->field as $field) {

            //pega o nome orifginal da imagem
            $previous_file = $model->getOriginal($field);
            //envia para a Trait removeFile e remove a imagem da pasta
            $this->removeFile($previous_file);
        }
    }
    public function updating(Header $model)
    {
        $this->updateFile($model);
    }
}