<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tin_tuc;
use App\the_loai;
use App\User;
use App\loai_tin;
use App\comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login(){
    	$the_loai= the_loai::all();
    	$loai_tin= loai_tin::all();
    	$tin_tuc= tin_tuc::all();
    	return view('users.user_login' ,['the_loai'=>$the_loai, 'loai_tin'=>$loai_tin, 'tin_tuc'=>$tin_tuc]);
    }
    public function postlogin(Request $request){
    	$this->validate($request,[
    		'email'=>'required',
    		'password'=> 'required|min:3|max:32'
    	],[
    		'email.required'=>'Bạn chưa nhập email',
    		'password.required'=>'Bạn chưa nhập password',
    		'password.min'=>'password không được nhỏ hơn 3 ký tự',
    		'password.max'=>'password không được lớn hơn 32 ký tự'
    	]);
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
    	{
    		return redirect('/');
    	}else{
    		return redirect('user/login')->with('thongbao', 'Đăng nhập không thành công');
    	}
    }
    public function register(){
    	$the_loai= the_loai::all();
    	$loai_tin= loai_tin::all();
    	$tin_tuc= tin_tuc::all();
    	return view('users.user_register' ,['the_loai'=>$the_loai, 'loai_tin'=>$loai_tin, 'tin_tuc'=>$tin_tuc]);
    }
}
