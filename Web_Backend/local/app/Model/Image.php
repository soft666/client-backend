<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';

    public function PathSaveImage() {
      return 'images/';
    }
}
