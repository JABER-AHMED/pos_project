<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Supply;
use App\Product;
use Session;

class ProductsController extends Controller
{
    public function index()
    {
    	$products = Product::all();
        return View('admin.products.index')->withProducts($products);
    }

    public function create($id=null)
    {
    	$categories = Category::all();
        $supplies = Supply::all();
    	return View('admin.products.create',[

            'product' => Product::findorNew($id)

        ])->withCategories($categories)->withSupplies($supplies);
    }

    public function store(Request $request, $id=null)
    {
    	$this->validate($request, array(

            'name' => 'required',
            'product_unit' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'amount' => 'required',
            'details' => 'required|max:100'

        ));

        $product = Product::findorNew($id);

        $product->fill($request->all());
        $product->save();

        $product->supplies()->sync($request->supplies, false);

        return redirect()->route('product.create');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        $product->supplies()->detach();

        $product->delete();

        Session::flash('success', 'Item deleted successfully');

        return redirect()->back();
    }
}
