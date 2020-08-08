<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Route;
use App\tin_tuc;
use App\the_loai;
use App\User;
use App\loai_tin;
use App\comment;
use App\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberLoginController extends Controller
{
    //
    use AuthenticatesUsers;
    public  function __construct(){
    	$this->middleware('guest:member')->except('logout','member.logout');;
    }
    protected function guard()
    {
        return Auth::guard('member');
    }
    public function showLoginForm(){
         $this->middleware('member');
         $the_loai= the_loai::all();
        $loai_tin= loai_tin::all();
        $tin_tuc= tin_tuc::all();
        return view('members.login' ,['the_loai'=>$the_loai, 'loai_tin'=>$loai_tin, 'tin_tuc'=>$tin_tuc]);
    }
    public function login(Request $request){
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	if(Auth::guard('member')->attempt(['email'=>$request->email,'password'=>$request->password], $request->remember)){
    		return redirect()->intended(route('index'));
    	};
    	return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function showRegisterForm(){
        $the_loai= the_loai::all();
        $loai_tin= loai_tin::all();
        $tin_tuc= tin_tuc::all();
        return view('members.register' ,['the_loai'=>$the_loai, 'loai_tin'=>$loai_tin, 'tin_tuc'=>$tin_tuc]);
    }
    public function register(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $member = new Admin;
        $member->name= $request->name;
        $member->email=$request->email;
        $member->password= Hash::make($request->password);
        $member->save();
        if(Auth::guard('member')->attempt(['email'=>$request->email,'password'=>$request->password], $request->remember)){
            return redirect()->intended(route('index'));
        };
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function logout(){
        Auth::guard('member')->logout();
        return redirect('/');
    }
}
