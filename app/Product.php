<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'quantity', 'amount', 'details', 'product_unit', 'category_id'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function supplies()
    {
    	return $this->belongstoMany('App\Supply');
    }

    public function orders()
    {
    	return $this->belongstoMany('App\Order');
    }
}
