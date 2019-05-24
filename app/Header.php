<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $fillable = ['titulo','logo','logo-desc','banner','banner-desc','status'];
}
