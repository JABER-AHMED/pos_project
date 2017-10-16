<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use DB;
use App\Invoice;

class HomeController extends Controller
{
     public function index()
     {
     	$orders = Order::all();
     	$sum = Order::sum('amount');
     	$products = Product::all();
        $invoice = new Invoice();
        $lastInvoiceID = $invoice->orderBy('id', 'DESC')->pluck('id')->first();
        $newinvoiceid = $lastInvoiceID + 1;
     	return View('home')->withOrders($orders)->withProducts($products)->withSum($sum)->withNewinvoiceid($newinvoiceid);
     }

    public function dataAjax(Request $request)
    {
     $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("products")
                    ->select("id","name")
                    ->where('name','LIKE',"%$search%")
                    ->get();
        }

        return response()->json($data);
    }
}


