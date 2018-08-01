<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    //
    public function count()
    {
        $counts= DB::select("SELECT count(shop_id) as c,s.shop_name as `name` from orders as o  
                    JOIN shops as s on s.id=o.shop_id
                    GROUP BY o.shop_id
                    ORDER BY c desc
                    LIMIT 0,5");

        return view('order/count',compact('counts'));
    }

    public function month(Request $request)
    {
        $month = $request->year.'-'.$request->month;
        $where = '';
        if ($month){
            $where = "where o.created_at like '%{$month}%'";
        }
        $counts= DB::select("SELECT count(shop_id) as c,s.shop_name as `name` from orders as o  
                    JOIN shops as s on s.id=o.shop_id
                   $where
                    GROUP BY o.shop_id
                    ORDER BY c desc
                    LIMIT 0,5");

        return view('order/month',compact('counts'));
    }

    public function day(Request $request)
    {
        $day = $request->day;
        $where = '';
        if ($day){
            $where = "where o.created_at like '%{$day}%'";
        }
        $counts= DB::select("SELECT count(shop_id) as c,s.shop_name as `name` from orders as o  
                    JOIN shops as s on s.id=o.shop_id
                   $where
                    GROUP BY o.shop_id
                    ORDER BY c desc
                    LIMIT 0,5");

        return view('order/day',compact('counts','day'));
    }


    public function menu()
    {
        $counts= DB::select("SELECT sum(o.amount) as sum,s.shop_name as `name`,m.goods_name 
                    from order_goods as o  
                    JOIN orders on o.order_id=orders.id
                    JOIN shops as s on s.id=orders.shop_id
                    JOIN menuses as m on m.id=o.goods_id
                    GROUP BY m.id
                    ORDER BY sum desc
                    LIMIT 0,5");

        return view('order/menu',compact('counts'));
    }

    public function menu_month(Request $request)
    {
        $month = $request->year.'-'.$request->month;
        $where = '';
        if ($month){
            $where = "where o.created_at like '%{$month}%'";
        }
        $counts= DB::select("SELECT sum(o.amount) as sum,s.shop_name as `name`,m.goods_name 
                    from order_goods as o  
                    JOIN orders on o.order_id=orders.id
                    JOIN shops as s on s.id=orders.shop_id
                    JOIN menuses as m on m.id=o.goods_id
                    $where
                    GROUP BY m.id
                    ORDER BY sum desc
                    LIMIT 0,5");

        return view('order/menu_month',compact('counts'));
    }

    public function mday(Request $request)
    {
        $day = $request->day;
        $where = '';
        if ($day){
            $where = "where o.created_at like '%{$day}%'";
        }
        $counts= DB::select("SELECT sum(o.amount) as sum,s.shop_name as `name`,m.goods_name 
                    from order_goods as o  
                    JOIN orders on o.order_id=orders.id
                    JOIN shops as s on s.id=orders.shop_id
                    JOIN menuses as m on m.id=o.goods_id
                    $where
                    GROUP BY m.id
                    ORDER BY sum desc
                    LIMIT 0,5");

        return view('order/mday',compact('counts'));
    }
}
