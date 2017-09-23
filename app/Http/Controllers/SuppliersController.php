<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supply;

class SuppliersController extends Controller
{
    public function index()
    {
    	$suppliers = Supply::all();

    	return View('admin.suppliers.index')->withSuppliers($suppliers);
    }

    public function create($id = null)
    {
    	return View('admin.suppliers.create', [

    		'supply' => Supply::findorNew($id)

    	]);
    }

    public function store(Request $request, $id = null)
    {
    	$this->validate($request, array(

    		'name' => 'required',
    		'address' => 'required',
    		'phone' => 'required'

    	));

    	$supply = Supply::findorNew($id);
    	$supply->fill($request->all());
    	$supply->save();

    	return redirect()->route('suppliers.create');
    }

    public function delete($id)
    {
    	$supply = Supply::find($id);

    	$supply->delete();

    	return redirect()->back();
    }
}
