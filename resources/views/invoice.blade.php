@extends('layouts.invoicemaster')
@section('title')
@endsection
@section('content')
<div class="container">
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
  <!-- Table header -->
  <div class="row clearfix">
    <div class="col-md-12">
      <table class="table table-condensed table-hover" id="tab_logic" style="border:1px solid #ededed;">
        <thead style="background-color: #41B883;color: #ffffff;font-size: 1.7rem;">
          <tr>
            <th class="text-center"> # </th>
            <th class="text-center"> Product </th>
            <th class="text-center"> Qty </th>
            <th class="text-center"> Price </th>
            <th class="text-center"> Total </th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>1</td>
            <td><select class="product_id form-control select2-multi name_form" name="product_id" multiple="multiple" id="">
              @foreach($products as $product)
              <option data-price="{{ $product->price }}" value="{{$product->id}}">{{$product->name}}</option>
              @endforeach
            </select></td>
            <td><input type="number" name='qty' placeholder='Enter Qty' class="form-control qty" step="0" min="0" /></td>
            <td><input type="number" name='price' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"
            /></td>
            <td><input type="number" name='total' placeholder='0.00' class="form-control total" readonly/></td>
          </tr>
        <tr id='addr1'></tr>
      </tbody>
    </table>
  </div>
</div>
<!-- Table body -->
<div class="row clearfix">
  <div class="col-md-12">
    <button id="add_row" class="btn btn-default pull-left btn-info" style="background-color: #41B883;">Add Product</button>
    <button id='delete_row' class="pull-right btn btn-default btn-danger">Delete Product</button>
  </div>
</div>
<!-- Amount calculation section -->
<div class="row clearfix" style="margin-top:20px">
  <div class="pull-right col-md-4">
    <table class="table table-bordered table-hover" id="tab_logic_total">
      <tbody>
        <tr>
          <th class="text-center">Sub Total</th>
          <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
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
</div>
@endsection