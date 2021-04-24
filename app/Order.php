<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ="order";
    protected $fillable = ['order_id','customer_id','shipping_id','order_status','order_code'];
    protected $primaryKey = 'order_id';

    public function shipping()
    {
    	return $this->belongsTo(Shipping::class,'shipping_id');
    }
}
