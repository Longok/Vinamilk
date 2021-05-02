<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ="products";
    protected $fillable = ['name','category_id','desc','image','price','quantity','discount','sale'];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function order_detail()
    {
    	return $this->hasMany(Order_detail::class, 'product_id', 'id');
    }
}

