<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tin_tuc;
use App\the_loai;
use App\Admin;
use App\loai_tin;
use App\comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class web extends Controller
{
    //
    public function index(){
     $the_loai= the_loai::all();
     $loai_tin=loai_tin::all();
     $tin_tuc= tin_tuc::all();
     return view('pages.home',['the_loai'=>$the_loai,'loai_tin'=>$loai_tin, 'tin_tuc'=>$tin_tuc]);
    }
    public function contact(){
     $the_loai= the_loai::all();
     $loai_tin=loai_tin::all();
     $tin_tuc= tin_tuc::all();
     return view('pages.contact',['the_loai'=>$the_loai,'loai_tin'=>$loai_tin, 'tin_tuc'=>$tin_tuc]);
    }
    public function about(){
     $the_loai= the_loai::all();
     $loai_tin=loai_tin::all();
     $tin_tuc= tin_tuc::all();
     return view('pages.about',['the_loai'=>$the_loai,'loai_tin'=>$loai_tin, 'tin_tuc'=>$tin_tuc]);
    }
    public function catagories_post($catagories){
     $loai_tin=loai_tin::all();
     $the_loai= the_loai::all();
     $tin_tuc=tin_tuc::all();
     $comment=comment::all();
     $member=Admin::all();
     $data=$loai_tin->where('ten_khong_dau','=', $catagories)->first();
     $data=tin_tuc::where('id_loai_tin','=', $data['id'])->orderBy('created_at', 'DESC')->paginate(4);
     return view('pages.catagories_post',['the_loai'=>$the_loai, 'loai_tin'=>$loai_tin ,'tin_tuc'=>$tin_tuc,'comment'=>$comment,'member'=>$member, 'data'=>$data]);
    }
    public function single_post($catagories , $id){
     $loai_tin=loai_tin::all();
     $the_loai= the_loai::all();
     $tin_tuc=tin_tuc::all();
     $member=Admin::all();
     $comment=comment::all();
     $data=$tin_tuc->where('tieu_de_khong_dau','=',$id)->first();
     return view('pages.sigle_post',['the_loai'=>$the_loai, 'loai_tin'=>$loai_tin ,'comment'=>$comment,'tin_tuc'=>$tin_tuc,'member'=>$member ,'data'=>$data]);
    }
    public function member_page($id){
     $member=Admin::find($id);
     $loai_tin=loai_tin::all();
     $the_loai= the_loai::all();
     $tin_tuc=tin_tuc::all();
     $comment=comment::all();
     return view('members.pages',['the_loai'=>$the_loai, 'loai_tin'=>$loai_tin ,'tin_tuc'=>$tin_tuc,'member'=>$member,'comment' =>$comment]);
    }
    public function edit_page($id){
     $id_login = Auth::guard('member')->id();// Lấy thông tin user đã đăng nhập
      // dd((int)$id);
     if($id_login === (int)$id){
     $member=Admin::find($id);
     $loai_tin=loai_tin::all();
     $the_loai= the_loai::all();
     $tin_tuc=tin_tuc::all();
     $comment=comment::all();
     return view('members.edit_page',['the_loai'=>$the_loai, 'loai_tin'=>$loai_tin ,'tin_tuc'=>$tin_tuc,'member'=>$member,'comment' =>$comment]);
     }
        return redirect('member/profile'.'/'.$id_login)->with('thongbao','Không nên chỉnh sửa thông tin người khác nhé');
    }
    public function postedit_page(Request $request,$id){
     $member=Admin::find($id);
     $this->validate($request,[
        'name'=>'required',
        'email'=>'required',

     ],[
        'name.required'=>'Bạn không được bỏ trống tên',
        'email.required'=>'Bạn không được bỏ trống email'
     ]);
     $member->name=$request->name;
     $member->email=$request->email;
     $member->phonenum=$request->phonenum;
     $member->profession=$request->profession;
     if($request->hasFile('avatar')){
        $file= $request->file("avatar");
        if($file->getClientOriginalExtension("avatar")=="jpg" || $file->getClientOriginalExtension("avatar")=="png")
        {
            $filename= $file->getClientOriginalName("avatar");
            $Img= Str::random(4)."_".$filename;
            while (file_exists("upload/avatar/".$Img)){
                $Img= Str::random(4)."_".$filename;
            }
            $file->move("upload/avatar/", $Img);
            if($member->Img == null){

            }else{
                unlink("upload/avatar".$memmber->Img);
                
            }
            $member->avatar= $Img;
        }
    }
    $member->save();
    return redirect('member/profile/edit'.'/'.$member->id)->with('thongbao', 'Sửa thành công');
    }
    public function postcmt(Request $request,$catagories,$id){
        $tin_tuc=tin_tuc::all();
        $tin_tuc=$tin_tuc->where('tieu_de_khong_dau','=',$id)->first();
        $comment=new comment;
        $this->validate($request,[
            'message'=>'required',
        ],[
            'message.required'=>'Bạn chưa nhập nội dung',
        ]);
        $comment->id_tin_tuc=$tin_tuc['id'];
        $comment->id_user=Auth::guard('member')->user()->id;
        $comment->noi_dung=$request->message;
        $comment->save();
        return redirect('/'.$catagories.'/'.$id);
    }
}
