<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admins extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    //
    protected $fillable=['name','email','password','rememberToken'];
}
