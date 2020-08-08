<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loai_tin extends Model
{
    //
     protected $table="loai_tin";

     public function theloai(){
     	return $this->belongsTo('App\the_loai', 'id_the_loai', 'id');
     }
     public function tintuc(){
     	return $this->hasMany('App\tin_tuc', 'id_loai_tin','id');
     }
}
