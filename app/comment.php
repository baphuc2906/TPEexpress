<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table="comment";

    public function tintuc(){
    	return $this->belongsTo('App\tin_tuc', 'id_tin_tuc', 'id');
    }

    public function users(){
    	return $this->belongsTo('App\Admin','id');
    }
}
