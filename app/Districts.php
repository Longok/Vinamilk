<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    public $timestamps = false;    
    protected $table="districts";
    protected $primaryKey ="maqh";
    protected $fillable = ['name','type','matp',];

    public function City()
    {
        return $this->belongsTo('App\City','matp','maqh');
    } 
    

    public function Wards()
    {
        return $this->hasMany('App\Wards','maqh','xaid');
    } 

}