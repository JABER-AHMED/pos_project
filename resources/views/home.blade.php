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
                            <thead style="background-color: #41B883;color: #ffffff;font-size: 1.7rem;">
                                <tr >
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="tablebody">
                                <tr id='addr0'>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        <select class="form-control product_id" name="product_id[]">
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
                                        <th class="text-center">Vat Amount</th>
                                        <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Grand Total</th>
                                        <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
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
<a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
</div>
{{--  container  --}}
@endsection