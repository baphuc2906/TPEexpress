<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\loai_tin;
use App\the_loai;

class LoaiTinController extends Controller
{
    //
    public function getdanhsach(){
    	$loai_tin=loai_tin::with('theloai')->get();
     	return view('admin.loaitin.danhsachlt',['loaitin'=>$loai_tin]);
    }
    public function getthem(){
    	$the_loai=the_loai::all();
    	return view('admin.loaitin.themlt',['theloai'=>$the_loai]);
    }
    public function postthem(Request $request){
    	$this->validate($request,[
    			'Ten'=>'required|unique:loai_tin|min:3|max:100',
    			'TheLoai'=>'required'
    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập tên loại tin',
    			'Ten.unique'=>'Ten loai tin da ton tai',
    			'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    			'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    			'TheLoai.required'=>'Bạn chưa chọn thể loại'
    		]);
    	$loaitin= new loai_tin;
    	$loaitin->ten= $request->Ten;
    	$loaitin->ten_khong_dau=Str::slug($request->Ten,'-');
    	$loaitin->id_the_loai= $request->TheLoai;
    	$loaitin->save();
    	return redirect('admin/loaitin/danhsach')->with('thongbao', 'Thêm thành công');
    }
    public function getsua($id){

    	$loai_tin=loai_tin::find($id);
    	$the_loai=the_loai::all();
    	return view('admin.loaitin.sualt',['loaitin'=>$loai_tin, 'theloai'=>$the_loai]);
    }
    public function postsua(Request $request, $id){
    	$this->validate($request,[
    			'Ten'=>'required|unique:loai_tin|min:3|max:100',
    			'TheLoai'=>'required'
    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập tên loại tin',
    			'Ten.unique'=>'Ten loai tin da ton tai',
    			'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    			'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    			'TheLoai.required'=>'Bạn chưa chọn thể loại'
    		]);
    	$loaitin=loai_tin::find($id);
    	$loaitin->ten= $request->Ten;
    	$loaitin->ten_khong_dau=Str::slug($request->Ten,'-');
    	$loaitin->id_the_loai= $request->TheLoai;
    	$loaitin->save();
    	return redirect('admin/loaitin/danhsach')->with('thongbao', 'Đã sửa thành công');
    }
    public function getxoa($id){

    	$loai_tin=loai_tin::find($id);
    	$loai_tin->delete();
        // $loai_tin=loai_tin::all();
        //     // dd(var_dump($loai_tin));
        // foreach ($loai_tin as $value) {
            
        //     $value->ten_khong_dau=Str::slug($value->ten,'-');
        //     // dd(var_dump(  $value->ten_khong_dau));
        //     $value->save();
        // }

    	return redirect('admin/loaitin/danhsach')->with('thongbao', 'Bạn đã xoá tên loại tin : '.$loai_tin->ten.' thành công');;
    }
}
