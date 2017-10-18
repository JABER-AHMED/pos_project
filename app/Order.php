<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
    	return $this->belongsToMany('App\Product');
    }
    public function Invoice()
    {
    	return $this->belongsTo('App\Invoice');
    }

    protected $fillable = ['qty', 'price', 'amount', 'invoice_id'];
}
