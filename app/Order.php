<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ="order";
    protected $fillable = ['order_id','user_id','shipping_id','order_total','order_status','created_at'];
    protected $primaryKey = 'order_id';
}
