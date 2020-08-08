<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tin_tuc;
use App\the_loai;
use App\Admin;
use App\loai_tin;
use App\comment;
use Illuminate\Support\Str;

class TinTucController extends Controller
{
    //
    public function getdanhsach(){
    	$tin_tuc= tin_tuc::with('loaitin')->paginate(10);
    	// dd($tin_tuc);
    	//$loai_tin= loai_tin::all();
    	return view('admin.list_tin_tuc',['tin_tuc'=>$tin_tuc]);
    }
    public function getthem(){
    	$theloai= the_loai::all();
    	$loaitin= loai_tin::all();
    	return view('admin.tintuc.themtin', ['theloai'=>$theloai, 'loaitin'=>$loaitin]);
    }
    public function clean($str ){
       // $str= utf8_decode($str);
        $str=str_replace("&nbsp;", ' ', $str);
        $str=str_replace("&amp;", '&', $str);
        $str = trim($str);
        return $str;
    }
    public function postthem(Request $request){
    	
    	$this->validate($request,[
    			'tieu_de'=>'required|unique:tin_tuc|min:3|max:100',
    			'TheLoai'=>'required',
    			'LoaiTin'=>'required' ,
    			'editor1' => 'required'
    		],
    		[
    			'tieu_de.required'=>'Bạn chưa nhập tên tiêu đề',
    			'tieu_de.unique'=>'Ten loai tin da ton tai',
    			'tieu_de.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    			'tieu_de.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    			'TheLoai.required'=>'Bạn chưa chọn thể loại',
    			'LoaiTin.required'=>'Bạn chưa chọn loại tin',
    			'editor1.required'=>'Bạn chưa nhập nội dung'
    		]);
    	
    	$tintuc= new tin_tuc;
    	$tintuc->tieu_de= $request->tieu_de;
    	$tintuc->tieu_de_khong_dau=Str::slug($request->tieu_de,'-');
    	$tintuc->tom_tat= $request->TomTat;
    	$tintuc->id_loai_tin= $request->LoaiTin;
    	$tintuc->noi_dung= TinTucController::clean($request->editor1);
        if($request->hasFile('myimg')){
            
            // $request->file("myimg")->move(
            //  "images",
            //  "Saved.png"
            // );
            $file= $request->file("myimg");
            if($file->getClientOriginalExtension("myimg")=="jpg" || $file->getClientOriginalExtension("myimg")=="png")
            {
                $filename= $file->getClientOriginalName("myimg");
                $Img= Str::random(4)."_".$filename;
                while (file_exists("upload/tintuc/".$Img)){
                    $Img= Str::random(4)."_".$filename;
                }
                $file->move("upload/tintuc/", $Img);
                $tintuc->hinh= $Img;
            }else{
                echo "khong cho phep upload file";
                $tintuc->hinh= " ";
            }
        }else{
            $tintuc->hinh=" ";
        }
        $tintuc->noi_bat=  $request->optradio;
        $tintuc->so_luot_xem=0;
    	$tintuc->save();
    	return redirect('admin/tintuc/danhsach')->with('thongbao', 'Thêm thành công');
    }
    public function getsua($id){ 
        $tintuc= tin_tuc::find($id);
        $member= Admin::all();
        $theloai=the_loai::all();
        $loaitin= loai_tin::all();
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin' =>$loaitin, 'member'=>$member]);
    }
    public function postsua(Request $request, $id){
        $tintuc= tin_tuc::find($id);
        $this->validate($request,[
                'tieu_de'=>'required|min:3|max:100',
                'TheLoai'=>'required',
                'LoaiTin'=>'required' ,
                'editor1' => 'required'
            ],
            [
                'tieu_de.required'=>'Bạn chưa nhập tên tiêu đề',
                'tieu_de.unique'=>'Ten loai tin da ton tai',
                'tieu_de.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'tieu_de.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'TheLoai.required'=>'Bạn chưa chọn thể loại',
                'LoaiTin.required'=>'Bạn chưa chọn loại tin',
                'editor1.required'=>'Bạn chưa nhập nội dung'
            ]);
        
        // $tintuc= new tin_tuc;
        $tintuc->tieu_de= $request->tieu_de;
        $tintuc->tieu_de_khong_dau=Str::slug($request->tieu_de,'-');
        $tintuc->tom_tat= $request->TomTat;
        $tintuc->id_loai_tin= $request->LoaiTin;
        $tintuc->noi_dung= TinTucController::clean($request->editor1);
        if($request->hasFile('myimg')){
            
            // $request->file("myimg")->move(
            //  "images",
            //  "Saved.png"
            // );
            $file= $request->file("myimg");
            if($file->getClientOriginalExtension("myimg")=="jpg" || $file->getClientOriginalExtension("myimg")=="png")
            {
                $filename= $file->getClientOriginalName("myimg");
                $Img= Str::random(4)."_".$filename;
                while (file_exists("upload/tintuc/".$Img)){
                    $Img= Str::random(4)."_".$filename;
                }
                $file->move("upload/tintuc/", $Img);
                if($tintuc->Img == null){

                }else{
                    unlink("upload/tintuc".$tintuc->Img);
                    
                }
                $tintuc->hinh= $Img;
            }
        }
        $tintuc->noi_bat= $request->optradio;
        $tintuc->so_luot_xem=0;
        $tintuc->save();
        return redirect('admin/tintuc/danhsach')->with('thongbao', 'Sửa thành công');
    }
    public function getxoa($id){
        $tintuc= tin_tuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao', 'Xoá thành công');
    }
}
