<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tin_tuc;
use App\the_loai;
use App\User;
use App\loai_tin;
use App\comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post_count = tin_tuc::all();
        $loai_tin = loai_tin::all();
        $the_loai = the_loai::all();
        $comment = comment::all();
        return view('admin.home',['num_post'=>$post_count, 'num_loaitin'=> $loai_tin, 'num_theloai' => $the_loai, 'num_comment' => $comment]);
    }
}
