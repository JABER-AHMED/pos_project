@extends('layouts.authmaster')
@section('title')
@endsection
@section('content')


    <div class="container">
        <div class="row clearfix">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-defaul">
                    <div class="panel-body">
                        <form method="post" action="{{route('order.store')}}">
                            {{csrf_field()}}
                            <div class="row clearfix" style="margin-top:20px">
                                <div class="pull-right col-md-4">
                                    <table class="table table-bordered table-hover" id="tab_logic_total">
                                        <tbody>
                                            <tr>
                                                <th class="text-center">INVOICE#</th>
                                                <td class="text-center"><input type="text" name='invoice' class="form-control"/></td>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Date</th>
                                                <td class="text-center"><input type="text" name='date' class="form-control"/></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{--  row clearfix  --}}
                            <table class="table table-bordered table-hover" id="tab_logic">
                                <thead style="background-color: #41B883;color: #ffffff;font-size: 1.7rem;">
                                    <tr >
                                        {{--  <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            Name
                                        </th>
                                        <th class="text-center">
                                            Mail
                                        </th>
                                        <th class="text-center">
                                            Mobile
                                        </th>  --}}
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='addr0'>
                                        <td>
                                        1
                                        </td>

                                        {{--  <td>
                                        <input type="text" name='name0'  placeholder='Name' class="form-control"/>
                                        </td>

                                        <td>
                                        <input type="text" name='mail0' placeholder='Mail' class="form-control"/>
                                        </td>

                                        <td>
                                        <input type="text" name='mobile0' placeholder='Mobile' class="form-control"/>
                                        </td>  --}}
                                        <td>
                                            <select class="form-control product_id selectpicker" data-live-search="true" name="product_id[]">
                                                @foreach($products as $product)
                                                <option data-price="{!! $product->price !!}" value="{!! $product->id !!}">{!! $product->name!!}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                        <input type="text" class="qty form-control" name="qty[]" value="{{ old('email') }}">
                                        </td>
                                        <td>
                                            <input type="text" class="price form-control" name="price[]" value="{{ old('email') }}">
                                        </td>
                                        <td>
                                            <input type="text" class="amount form-control" name="amount[]">
                                        </td>
                                        <td>
                                            <input type="button" class="btn btn-danger delete" value="x">
                                        </td>
                                    </tr>
                                    <tr id='addr1'></tr>
                                </tbody>
                            </table>
                            {{--  table  --}}
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
            <a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
    </div>
    {{--  container  --}}
@endsection