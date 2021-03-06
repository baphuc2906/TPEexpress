<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;
use Auth;
use App\tin_tuc;
use App\the_loai;
use App\User;
use App\loai_tin;
use App\comment;
use App\Admin;
use Illuminate\Support\Str;

class MemberResetPasswordController extends Controller
{
    //
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:member');
    }

    protected function guard()
    {
      return Auth::guard('admin');
    }

    protected function broker()
    {
      return Password::broker('members');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset-admin',['the_loai'=>$the_loai, 'loai_tin'=>$loai_tin, 'tin_tuc'=>$tin_tuc])->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
