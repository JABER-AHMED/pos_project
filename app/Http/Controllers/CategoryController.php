<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	return View('admin.category.index')->withCategories($categories);
    }

    public function delete($id)
    {
    	$category = Category::find($id);

    	$category->delete();

    	return redirect()->back();
    }

    public function store(Request $request)
    {
        $this->validate($request, array(

            'name' => 'required'
        ));

        $category = new Category;

        $category->fill($request->all());

        $category->save();

        return redirect()->back();
    }
}
