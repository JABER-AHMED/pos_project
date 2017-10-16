<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function orders()
    {
    	return $this->belongsToMany('App\Order');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    protected $fillable = ['date', 'user_id'];
}
