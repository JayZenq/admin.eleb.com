<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Nav extends Model
{
    //
    protected  $fillable = ['name','url','permission_id','pid'];

    public function permission()
    {
        return $this->belongsTo(Permission::class,'permission_id');
        //Student::class ==== 'App\Models\Student'
    }
}
