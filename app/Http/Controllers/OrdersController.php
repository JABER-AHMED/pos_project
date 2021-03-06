<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Input;
use App\Order;
use App\Product;
use App\Invoice;
use Sentinel;

class OrdersController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request, array(

                'total_amount' => 'required',
                'date' => 'required'

          ));

          $invoice = new Invoice();

          $invoice->total_price = $request->total_amount;
          $invoice->vat = $request->vat_amount;
          $invoice->discount = $request->discount_amount;
          $invoice->date = $request->date;
          $invoice->user_id = Sentinel::getUser()->id;
          $invoice->id = $request->invoice;

          $invoice->save();

         foreach($request->product_id as $key => $value){
            
            $data = array(

                'product_id' => $value,
                'invoice_id' => $invoice->id,
                'qty' => $request->qty[$key],
                'price' => $request->price[$key],
                'amount' => $request->amount[$key]
            );

            Order::insert($data);

             // $order = $this->storeOrder($data);
          
             // $order->products()->attach($value);
         }
         return redirect()->route('invoice.index', $invoice->id);
    }

    // public function storeOrder(array $data)
    // {
    //     return Order::create($data);
    // }

    public function delete($id)
    {
       $invoice = Invoice::find($id);

       $invoice->delete();

       return redirect()->back();
    }
}
