<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;    
    protected $table="city";
    protected $primaryKey ="matp";
    protected $fillable = ['name','type'];
    
    public function Districts()
    {
        return $this->hasMany('App\City','matp');
    }
}