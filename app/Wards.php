<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{public $timestamps = false;    
    protected $table="wards";
    protected $primaryKey ="xaid";
    protected $fillable = ['name','type','maqh'];

    public function Districts()
    {
        return $this->belongsTo('App\Districts','maqh','xaid');
    } 
}