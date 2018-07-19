<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop_categories extends Model
{
    //添加可修改的字段
    protected $fillable=['name','img','status'];

}
