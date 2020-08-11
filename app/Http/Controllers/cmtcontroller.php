<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\the_loai;
use App\comment;
use App\Admin;

class cmtcontroller extends Controller
{
    //
    public function getxoa($id){
    	$member=Admin::all();
    	$cmt= comment::find($id);
    	$cmt->delete();
    	return redirect('admin/tintuc/sua/'.$cmt->id_tin_tuc)->with('thongbao', 'Xoá thành công');
    }
    public function danhsach(){
    	$member=Admin::all();
    	$cmt=comment::all();
    	return view('admin.comment.danhsach',['member'=>$member , 'comment' =>$cmt]);
    }
}
