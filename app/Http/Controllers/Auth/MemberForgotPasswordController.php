<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;
use App\tin_tuc;
use App\the_loai;
use App\User;
use App\loai_tin;
use App\comment;
use App\Admin;
use Illuminate\Support\Str;

class MemberForgotPasswordController extends Controller
{
    //
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:member');
    }

    protected function broker()
    {
      return Password::broker('members');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email-member',['the_loai'=>$the_loai, 'loai_tin'=>$loai_tin, 'tin_tuc'=>$tin_tuc]);
    }
}
