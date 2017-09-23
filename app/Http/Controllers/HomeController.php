<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

class HomeController extends Controller
{
     public function index()
     {
     	$orders = Order::all();
     	$sum = Order::sum('amount');
     	$products = Product::all();
     	return View('home')->withOrders($orders)->withProducts($products)->withSum($sum);
     }
}
