<?php

namespace App\Http\Controllers;

use App\Models\Event_member;
use Illuminate\Http\Request;

class EventMembersController extends Controller
{
    //报名表
    public function index()
    {
        $members =  Event_member::all();
        return view('event_member/index',compact('members'));
    }
}
