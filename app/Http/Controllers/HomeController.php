<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use DB;
use App\Invoice;

class HomeController extends Controller
{
     public function CreateOrders()
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

    public function invoiceList()
    {
        $invoices = Invoice::all();
        return View('invoice.list')->withInvoices($invoices);
    }

    public function invoiceIndex($id)
    {
        $invoice = Invoice::find($id);
        $invoices = DB::table('products')
        ->join('orders', 'products.id', '=', 'orders.product_id')
        ->join('invoices', 'invoices.id', '=', 'orders.invoice_id')
        ->where('orders.invoice_id', $id)
        ->get();

        //dd($invoices);

        return view('invoice.index')->withInvoices($invoices)->withInvoice($invoice);
    }
}


