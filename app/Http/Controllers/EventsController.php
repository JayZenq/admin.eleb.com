<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_member;
use App\Models\Event_prize;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    //抽奖活动表
    public function index()
    {
        //查询活动列表
        $events =  Event::paginate(10);
        return view('event/index',compact('events'));
    }

    public function create()
    {
        return view('event/create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'signup_start'=>'required|after:today',
            'signup_end'=>'required|after:signup_start',
            'prize_date'=>'required|after:signup_end',
            'signup_num'=>'required',
        ],[
            'title.required'=>'活动名不能为空',
            'content.required'=>'活动内容不能为空',
            'signup_start.required'=>'开始时间不能为空',
            'signup_start.after'=>'开始时间不能为今天之前',
            'signup_end.after'=>'结束时间应在开始时间之前',
            'signup_end.required'=>'结束时间不能为空',
            'prize_date.required'=>'开奖日期不能为空',
            'prize_date.after'=>'开奖日期不能在报名结束之前',
            'signup_num.required'=>'报名人数限制不能为空',
        ]);

        Event::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'signup_start'=>strtotime($request->signup_start),
            'signup_end'=>strtotime($request->signup_end),
            'prize_date'=>$request->prize_date,
            'signup_num'=>$request->signup_num,
            'is_prize'=>0,
        ]);

        session()->flash('success','添加成功');
        return redirect('event');
    }

    public function edit(Event $event)
    {
        return view('event/edit',compact('event'));
    }

    public function update(Request $request,Event $event)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'signup_start'=>'required',
            'signup_end'=>'required|after:signup_start',
            'prize_date'=>'required|after:signup_end',
            'signup_num'=>'required',
        ],[
            'title.required'=>'活动名不能为空',
            'content.required'=>'活动内容不能为空',
            'signup_start.required'=>'开始时间不能为空',
            'signup_end.after'=>'结束时间应在开始时间之前',
            'signup_end.required'=>'结束时间不能为空',
            'prize_date.required'=>'开奖日期不能为空',
            'prize_date.after'=>'开奖日期不能在报名结束之前',
            'signup_num.required'=>'报名人数限制不能为空',
        ]);

        $event->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'signup_start'=>strtotime($request->signup_start),
            'signup_end'=>strtotime($request->signup_end),
            'prize_date'=>$request->prize_date,
            'signup_num'=>$request->signup_num,
        ]);

        session()->flash('success','编辑成功');
        return redirect('event');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        session()->flash('success','删除成功');
        return redirect('event');
    }

    public function show(Event $event)
    {
        return view('event/show',compact('event'));
    }

    public function lottery(Event $event)
    {//开奖
        //查询所有报名的商家
        $event_members = Event_member::where('events_id',$event->id)->get();
        //查询活动所有的礼品
        $event_prizes=Event_prize::where('events_id',$event->id)->get();

        $members = [];
        foreach ($event_members as $key=>$event_member){
            $members[$key]=$event_member->id;
        }
//        随机打乱报名商家id的数组
         shuffle($members);

        foreach ($event_prizes as $key=>$event_prize)
        {//遍历所有礼品
            $event_prize->update([
                'member_id'=>$members[$key],
            ]);
        }
        $event->update([
            'is_prize'=>1
        ]);

        return back()->with('success','开奖完成');
    }
}
