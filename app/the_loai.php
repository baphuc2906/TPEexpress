<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class the_loai extends Model
{
    //
     protected $table="the_loai";
     public function loaitin(){
     	return $this->hasMany('App\loai_tin', 'id_the_loai', 'id');
     }
     public function tintuc(){
     	return $this->hasManyThrough('App\tin_tuc', 'App\loai_tin','id_the_loai', 'id_loai_tin', 'id');
     }
}

