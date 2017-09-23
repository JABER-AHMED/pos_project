<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
    	 $this->validate($request, array(

    	 	'qty' => 'required',
    	 	'price' => 'required',
    	 	'amount' => 'required',
    	 	'product_id' => 'required'
    	));

    	 $order = new Order;

    	 $order->fill($request->all());

    	 $order->save();

    	 return redirect('/home');
    }

    public function delete($id)
    {
    	$order = Order::find($id);

        $order->delete();

        return redirect()->back();
    }
}
