<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    //会员管理
    public function index(Request $request)
    {
        $where = new Member();
        $username = $request->username;
        if ($username){
            $where = $where->where('username','like',$username);
        }
        $members =  $where->paginate(5);
        return view('/member/index',compact('members','username'));
    }

    //禁用会员账号

    public function status(Request $request,Member $member)
    {
        $member->update([
            'status'=>$request->status,
        ]);

        return back();
    }



}
