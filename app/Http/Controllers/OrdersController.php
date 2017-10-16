<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
    	 foreach($request->product_id as $key => $value){

            $data = array(

                'product_id' => $value,
                'qty' => $request->qty[$key],
                'price' => $request->price[$key],
                'amount' => $request->amount[$key]
            );
            Order::insert($data);
         }
    }
}
