@extends('layouts.authmaster')

@section('title')

@endsection

@section('content')

	
    <section id="home-body">
        <div class="container-fluid">
            <div class="row padding-top-5">
                <ul class="nav nav-tabs col-lg-4 col-lg-offset-5 col-md-5 col-md-offset-4 col-xs-8">
                    <li class="active"><a data-toggle="tab" href="#home">Selling</a></li>
                    <li><a data-toggle="tab" href="#menu1">Product list</a></li>
                    <li><a data-toggle="tab" href="#menu2">Return</a></li>
                    <li><a data-toggle="tab" href="#menu3">Sell History</a></li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="main-section">
                    <div class="row">
                        <div class="col-lg-3 col-lg-offset-1">
                            <div class="product-search">
                                <h3 class="h3"> Prduct Entry Section</h3>
                                <form action="{{route('order.store')}}" method="post">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="Name">Product Name</label>
                                        <select class="product_id form-control select2-multi" name="product_id" multiple="multiple">
                                            @foreach($products as $product)
                                            <option data-price="{{ $product->amount }}" value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="text" class="qty form-control" name="qty">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price/unit</label>
                                        <input type="text" class="price form-control" name="price">
                                    </div>
                                    <div class="form-group">
                                        <label for="total">Total</label>
                                        <input type="text" class="amount form-control" name="amount">
                                    </div>

                                    <button type="submit" class="btn btn-info">Enter</button>
                                </form>
                            </div>
                        </div>
					
                  <div class="col-lg-7 col-md-7 product-entry-table">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                 <table width="100%" class="table table-responsive table-bordered table-hover display display-table table-striped" id="dataTables"
                                    cellspacing="0">
                                    <thead >
                                        <tr>
                                            <th style="border-top: 3px solid #ddd;">Porduct ID</th>
                                            <th style="border-top: 3px solid #ddd;">Product Name</th>
                                            <th style="border-top: 3px solid #ddd;">Quantity</th>
                                            <th style="border-top: 3px solid #ddd;">Price</th>
                                            <th style="border-top: 3px solid #ddd;">Total</th>
                                            <th style="border-top: 3px solid #ddd; border-right:1px solid #ddd;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="entry_list" >
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->product->name}}</td>
                                            <td>{{$order->qty}}</td>
                                            <td>{{$order->price}}</td>
                                            <td>{{$order->amount}}</td>
                                            <td style="border-right: 1px solid #ddd;"><a href="{{route('order.delete', $order->id)}}" type="button" class="btn btn-danger text-center"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                            <div class="col-md-4 col-md-offset-1">
                                <table class="table table-responsive">
                                    <tbody class="calculation">
                                        <tr class="sub-total">
                                            <td>Sub-Total</td>
                                            <td>{{$sum}}Tk</td>
                                        </tr>
                                        <tr class="discount">
                                            <td>Discount</td>
                                            <td colspan="2">{{$sum*0.05}}Tk</td>
                                        </tr>
                                        <!-- <tr class="tax">
                                            <td>Tax</td>
                                            <td colspan="2">5%</td>
                                        </tr> -->
                                        <tr class="grand-total">
                                            <td>Grand Total</td>
                                            <td class="total" colspan="2">{{$sum-($sum*0.05)}}Tk</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="submit-btn text-right">
                                <form class="col-md-4 col-md-offset-2 form-horizontal">
                                    <div class="form-group text-left">
                                        <label class="control-label col-md-6" for="amount_recieved" style="font-size: 1.6rem; font-weight: normal;"> Amount Recieved</label>
                                        <div class="col-md-6">
                                            <input type="text" name="amountRecieved" class="getmoney form-control text-right">
                                        </div>
                                    </div>
                                    <div class="form-group text-left">
                                        <label class="control-label col-md-6" for="amount_return" style="font-size: 1.6rem; font-weight: normal;"> Amount To return</label>
                                        <div class="col-md-6">
                                            <input type="text" name="returnAmount" class="backmoney form-control text-right">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-success block">Pay Slip </button>
                                    </div>
                                </form>
                            </div>
                   </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">&copy All the rights reserved by HEXit 2017 </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- /#page-wrapper -->

@endsection