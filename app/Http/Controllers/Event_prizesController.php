<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_prize;
use Illuminate\Http\Request;

class Event_prizesController extends Controller
{
    //抽奖活动奖品表

    public function index(Request $request)
    {
        $event_id = $request->id;
        $where = new Event_prize();
        if ($event_id){
            $where= $where->where('events_id',$event_id);
        }

       $event_prizes = $where->paginate(10);
        return view('event_prizes/index',compact('event_prizes'));
    }

    public function create()
    {
        $events = Event::where('is_prize','0')->get();
        return view('event_prizes/create',compact('events'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'events_id'=>'required',
            'name'=>'required',
            'description'=>'required',
        ],[
            'events_id.required'=>'请选择属于的活动',
            'name.required'=>'奖品名不能为空',
            'description.required'=>'奖品详情不能为空',
        ]);
        Event_prize::create([
            'events_id'=>$request->events_id,
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        session()->flash('success','添加成功');
        return redirect('event_prize');
    }

    public function edit(Event_prize $event_prize)
    {
        $events = Event::where('is_prize',0)->get();
        return view('event_prizes/edit',compact('events','event_prize'));
    }

    public function update(Request $request,Event_prize $event_prize)
    {
        $this->validate($request,[
            'events_id'=>'required',
            'name'=>'required',
            'description'=>'required',
        ],[
            'events_id.required'=>'请选择属于的活动',
            'name.required'=>'奖品名不能为空',
            'description.required'=>'奖品详情不能为空',
        ]);

        $event_prize->update([
            'events_id'=>$request->events_id,
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        session()->flash('success','修改成功');
        return redirect('event_prize');
    }

    public function destroy(Event_prize $event_prize)
    {
        $event_prize->delete();
        session()->flash('success','删除成功');
        return redirect('event_prize');
    }
}
