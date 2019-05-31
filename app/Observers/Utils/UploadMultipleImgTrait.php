<?php

namespace App\Observers\Utils;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadMultipleImgTrait
{
    protected function createFile($model)
    {
        foreach ($this->field as $field) {

            if (is_a($model->$field, UploadedFile::class) and $model->$field->isValid()) {
                $this->upload($model, $field);
            }
        }
    }
    protected function updateFile($model)
    {

        foreach ($this->field as $field) {

            if (is_a($model->$field, UploadedFile::class) and $model->$field->isValid()) {

                $previous_file = $model->getOriginal($field);

                $this->upload($model, $field);
                $this->removeFile($previous_file);
            }
        }
    }
    protected function removeFile($field)
    {
        $prefix = Storage::disk(config('filesystems.default'))->getDriver()->getAdapter()->getPathPrefix();

        $imagem = $prefix . $this->path . '/' . $field;

        if (file_exists($imagem) and !is_dir($imagem)) {
            unlink($imagem);
        }

    }
    protected function upload($model, $field)
    {

        $extention = $model->$field->extension();

        $name = bin2hex(openssl_random_pseudo_bytes(8));
        $name = $name . '.' . $extention;

        $model->$field->storeAs($this->path, $name);

        //altera o nome do campo img, assim quando voltar para o controller e finalizar
        //o create, terá o mesmo nome da imagem salva na pasta public/img
        $model->$field = $name;

    }

}