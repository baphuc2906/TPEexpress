<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class MemberController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getdanhsach()
    {
        $member=Admin::all();
        return view('admin.members.danhsachmb',['member'=>$member]);
    }
    public function getxoa($id){
        $member=Admin::all();
        $member1=Admin::find($id);
        $member1->delete();
        return  view('admin.members.danhsachmb',['member'=>$member]);
    }
}
