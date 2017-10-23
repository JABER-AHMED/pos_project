@extends('layouts.authmaster')
@section('title')
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-defaul">
            <div class="panel-body" style="border: 1px solid #ddd">
                <form method="post" action="{{route('order.store')}}">
                    {{csrf_field()}}
                    <div class="row clearfix" style="margin-top:20px">
                        <div class="pull-left col-md-4">
                            <table class="table table-bordered table-hover" id="tab_logic_total">
                                <tbody>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <td class="text-center"><input type="text" name='c_name' class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Address:</th>
                                        <td class="text-center"><input type="text" name='address' class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Number:</th>
                                        <td class="text-center"><input type="text" name='phone' class="form-control"/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-right col-md-4">
                            <table class="table table-bordered table-hover" id="tab_logic_total">
                                <tbody>
                                    <tr>
                                        <th class="text-center">INVOICE#</th>
                                        <td class="text-center"><input type="text" name='invoice' class="form-control" value="{{$newinvoiceid}}" readonly /></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Date</th>
                                        <td class="text-center"><input type="text" name='date' class="form-control" value="{{Carbon\Carbon::now()}}" readonly /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--  row clearfix  --}}
                    <table class="table table-bordered table-hover" id="tab_logic">
                        <thead style="background-color: #428BCA;color: #ffffff;font-size: 1.7rem;">
                            <tr >
                                <th class="text-center">ID</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="tablebody">
                            <tr id='addr0'>
                                <td>
                                    1
                                </td>
                                <td>
                                    <select class="form-control product_id" name="product_id[]">
                                        @foreach($products as $product)
                                        <option>No Items</option>
                                        <option data-price="{{ $product->price }}" value="{{$product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="qty form-control" name="qty[]" value="{{ old('email') }}">
                                </td>
                                <td>
                                    <input type="number" class="price form-control" name="price[]" value="{{ old('email') }}">
                                </td>
                                <td>
                                    <input type="number" class="amount form-control" name="amount[]" readonly>
                                </td>
                                <td>
                                    <i type="button" class="btn btn-danger delete fa fa-trash-o" aria-hidden="true"></i>
                                </td>
                            </tr>
                        <tr id='addr1'></tr>
                    </tbody>
                </table>
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <a id="add_row" class="btn btn-lg btn-primary pull-left">Add Row</a>
                        </div>
                    </div>
                </div>
                {{--  table  --}}
                <div class="row clearfix" style="margin-top:20px">
                    <div class="pull-right col-md-4">
                        <table class="table table-bordered table-hover" id="tab_logic_total">
                            <tbody>
                                <tr>
                                    <th class="text-center">Sub Total</th>
                                    <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control sub_total" id="sub_total" readonly/></td>
                                </tr>
                                <tr>
                                    <th class="text-center">Vat</th>
                                    <td class="text-center">
                                        <div class="input-group mb-2 mb-sm-0">
                                            <input type="number" class="form-control" id="tax" placeholder="0">
                                            <div class="input-group-addon">%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center">Discount</th>
                                    <td class="text-center">
                                        <div class="input-group mb-2 mb-sm-0">
                                            <input type="number" class="form-control" id="discount" placeholder="0">
                                            <div class="input-group-addon">%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center">Vat Amount</th>
                                    <td class="text-center"><input type="number" name='vat_amount' id="vat_amount" placeholder='0.00' class="form-control" readonly/></td>
                                </tr>
                                <tr>
                                    <th class="text-center">Discount Amount</th>
                                    <td class="text-center"><input type="number" name='discount_amount' id="discount_amount" placeholder='0.00' class="form-control" readonly/></td>
                                </tr>
                                <tr>
                                    <th class="text-center">Grand Total</th>
                                    <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-left col-md-4" style="margin-top:210px">
                        <table class="table table-bordered table-hover" id="tab_logic_total">
                            <tbody>
                                <tr>
                                    <th class="text-center">Paid</th>
                                    <td class="text-center"><input type="text" name='paid' placeholder='0' class="form-control getmoney" id="paid"/></td>
                                </tr>
                                <tr>
                                    <th class="text-center">Return</th>
                                    <td class="text-center"><input type="text" name='return' id="return" placeholder='0' class="form-control backmoney" readonly /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button style="float: right;" class="btn btn-primary">Submit</button>
            </form>
            {{--  form  --}}
        </div>
        {{--  panel-body  --}}
    </div>
    {{--  panel  --}}
</div>
{{--  col  --}}
</div>
{{--  row  --}}
<!-- <a id='delete_row' class="pull-right btn btn-default">Delete Row</a> -->
@endsection