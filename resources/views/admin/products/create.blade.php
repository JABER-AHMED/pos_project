@extends('layouts.adminmaster')

@section('title')

@endsection

@section('content')

	
        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div id="add_product">
                        <div class="row">
                                <div class="col-md-6 col-md-offset-1 product-form">
                                <h3 class="h3 padding-2">Add Product</h3>
                                <form method="post" action="{{route('product.store', $product->id)}}">
                                {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="exampleInputEmail1">Product</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="name" value="{{$product->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="exampleInputEmail1">Category Name</label>
                                            <select class="form-control" name="category_id">
                                               @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="exampleInputPassword1">Price</label>
                                            <div class="input-group">
                                                <input type="text" class="price form-control" name="price" value="{{$product->price}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="exampleInputPassword1">Product Unit</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="product_unit" value="{{$product->product_unit}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="exampleInputPassword1">Quantity</label>
                                            <div class="input-group">
                                                <input type="text" class="qty form-control" name="quantity" value="{{$product->quantity}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="exampleInputPassword1">Total amount</label>
                                            <div class="input-group">
                                                <input type="text" class="amount form-control" name="amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="exampleInputPassword1">Suppliar</label>
                                            <select class="form-control select2-multi" name="supplies[]" multiple="multiple">
                                               @foreach($supplies as $supply)
                                                <option value="{{ $supply->id }}">{{ $supply->name}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="exampleInputPassword1">Details</label>
                                            <div class="input-group">
                                                <textarea class="form-control" name="details" rows="8" cols="100">{{$product->details}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-default register-btn right">Save</button>
                                </div>
                            
                             <!-- right section -->
                            <div class="col-md-3 col-md-offset-1">
                                <div class="catagory" style="margin-top:8rem; padding-bottom: 2rem; background: #f8f8f8;">
                                    <h3 class="h3 text-left" style="font-size:1.8rem;border-bottom:1px solid #e3e3e3; padding:1.5rem ;">Add Catagory:</h3>
                                </form>
                                    
                                    <!-- Add catagory field -->
                                    <form method="post" action="{{route('category.store')}}">
                                    {{csrf_field()}}
                                        <div style="margin-left: 20px;">
                                            <input type="button" class="btn btn-md btn-primary add" value="Add New Category">
                                        </div>
                                        <div style="margin-left: 20px; margin-top: 5px;" class="neworderbody"></div>
                                     </form>
                                </div>
                               
                            </div>
                            <!-- end right section -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    

@endsection