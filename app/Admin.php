<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Admin extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $table ="admin";
    protected $fillable = ['admin_id','admin_name','admin_email','admin_password','admin_roles'];

}
