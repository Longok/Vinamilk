<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ="products";
    protected $fillable = ['name','category_id','desc','image','price','quantity','discount'];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}

