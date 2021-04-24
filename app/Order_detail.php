<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table ="order_detail";
    protected $fillable = ['order_detail_id','order_code','product_id','product_name','product_price','product_quantity'];
    protected $primaryKey = 'order_detail_id';

    public function product()
    {
    	return $this->belongsTo(Product::class,'product_id');
    }
}
