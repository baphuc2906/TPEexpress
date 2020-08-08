<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\the_loai;


class TheLoaiController extends Controller
{
    //
    public function getdanhsach(){
    	$theloai= the_loai::all();
    	return view('admin.theloai.danhsachtl',['theloai'=>$theloai]);
    }
    public function getthem(){
    	$theloai= the_loai::all();

    	return view('admin.theloai.themtl');
    }
    public function postthem(Request $request){
    $this->validate($request, 
    		[
    			'Ten'=>'required|min:3|max:100'
    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập tên thể loại',
    			'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    			'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    		]);
    	$theloai = new the_loai;
    	$theloai->ten =$request->Ten;
    	$theloai->ten_khong_dau=Str::slug($request->Ten,'-');
    	$theloai->save();
    	return redirect('admin/theloai/them')->with('thongbao', 'Thêm thành công');
    }
    public function getsua($id){
    	$theloai = the_loai::find($id);
    	return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    public function postsua(Request $request, $id){
    	$theloai =the_loai::find($id);
    	$this->validate($request, 
    		[
    			'Ten'=>'required|unique:the_loai|min:3|max:100'
    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập tên thể loại',
    			'Ten.unique'=>'Ten the loai da ton tai',
    			'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    			'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    		]);
    		$theloai->ten =$request->Ten;
    		$theloai->ten_khong_dau=Str::slug($request->Ten,'-');
    		$theloai->save();
    		return redirect('admin/theloai/sua/'.$id)->with('thongbao', 'sửa thành công');
    }

    public function getxoa($id){
        $theloai=the_loai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao', 'Bạn đã xoá tên thể loại : '.$theloai->ten.' thành công');
    }
}
