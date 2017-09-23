<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellsController extends Controller
{
    public function index()
    {
    	return View('admin.sells.index');
    }
}
