<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table ="shipping";
    protected $fillable = ['shipping_id','shipping_name','shipping_adress','shipping_phone','shipping_note','shipping_method'];
    protected $primaryKey = 'shipping_id';

}
