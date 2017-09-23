<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Supply;
use Charts;

class AdminController extends Controller
{
   public function index()
   {
   		$chart = Charts::MultiDatabase('bar', 'highcharts')
				   		->dataset('Category', Category::all())
				    	->dataset('Supply', Supply::all())
					    ->elementLabel("Total")
					    ->dimensions(1000, 500)
					    ->responsive(true)
					    ->height(300)
            			->width(0)
					    ->lastByDay(30,true);

   		$category = Category::all()->count();
   		$supply = Supply::all()->count();
   		return View('admin.dashboard.index', ['chart' => $chart])->withCategory($category)->withSupply($supply);
   }
}

