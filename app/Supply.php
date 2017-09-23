<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillable = ['name', 'address', 'phone'];

    public function products()
    {
    	return $this->belongstoMany('App\Product');
    }
}
