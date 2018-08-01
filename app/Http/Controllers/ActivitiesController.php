<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    //活动表

    public function index(Request $request)
    {
        //已结束的活动不显示
        $where = new Activity();
        $data = time();//现在的时间
        $data = date('Y-m-d',$data);
        if ($request->a==1){
            $where = $where->where('start_time','>',$data);
        }elseif ($request->a==2){
            $where = $where->where('start_time','<',$data)->where('end_time','>',$data);
        }elseif ($request->a==3){
            $where = $where->where('end_time','<',$data);
        }
        $activities =$where->paginate(2);
        return view('activity/index',compact('activities'));
    }

    public function create()
    {
        return view('activity/create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'start_time'=>'required|date|after:today',
            'end_time'=>'required|date|after:start_time'
        ],[
            'title.required'=>'活动名称不能为空',
            'content.required'=>'活动内容不能为空',
            'start_time.required'=>'开始时间不能为空',
            'start_time.date'=>'开始时间不能为空',
            'start_time.after'=>'开始时间为今天之前',
            'end_time.required'=>'结束时间不能为空',
            'end_time.after'=>'结束时间不能在开始时间之前',
        ]);

        Activity::create([
            'title'=>$request->title,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'content'=>$request->content,
            ]);
        session()->flash('success','添加成功');
        return redirect('activities');
    }

    public function edit(Activity $activity)
    {
//        var_dump($activity->end_time);
//        var_dump(strtotime($activity->end_time));
//        die();
        return view('activity/edit',compact('activity'));
    }

    public function update(Request $request,Activity $activity)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'start_time'=>'required|date|after:today',
            'end_time'=>'required|date|after:start_time'
        ],[
            'title.required'=>'活动名称不能为空',
            'content.required'=>'活动内容不能为空',
            'start_time.required'=>'开始时间不能为空',
            'start_time.date'=>'开始时间不能为空',
            'start_time.after'=>'开始时间为今天之前',
            'end_time.required'=>'结束时间不能为空',
            'end_time.after'=>'结束时间不能在开始时间之前',
        ]);

        $activity->update([
            'title'=>$request->title,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'content'=>$request->content,
        ]);

        session()->flash('success','修改成功');
        return redirect('activities');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        session()->flash('success','删除成功');
        return redirect('activities');
    }

    public function show(Activity $activity)
    {
//        $data = time();
//        $data = date('Y-m-d',$data);
//        var_dump($data);
        return view('activity/show',compact('activity'));
    }
}
