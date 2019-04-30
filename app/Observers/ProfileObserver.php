<?php

namespace App\Observers;

use App\Profile;
use App\Observers\Utils\UploadTrait;

class ProfileObserver
{
    use UploadTrait;

    protected $field = 'foto';
    protected $path = 'img';

    public function creating(Profile $model)
    {
        //dd($model->titulo);
        //$model->titulo = 'teste2';
        $this->createFile($model);
    }
    public function deleting(Profile $model)
    {
        $this->removeFile($model->img);
    }
    public function updating(Profile $model)
    {
        $this->updateFile($model);
    }
}