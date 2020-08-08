<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\loai_tin;
use App\the_loai;

class AjaxController extends Controller
{
    //
    public function getLoaiTin($idTheLoai){
    	$loaitin= loai_tin::where('id_the_loai',$idTheLoai)->get();
    	foreach ($loaitin as $value) {
    		echo "<option class='text-capitalize' value='" .$value->id ."'>" .$value->ten ."</option>";
    	}
    }
}
