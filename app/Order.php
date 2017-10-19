<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
    public function Invoice()
    {
    	return $this->belongsTo('App\Invoice');
    }

    protected $fillable = ['qty', 'price', 'amount', 'invoice_id', 'product_id'];
}
