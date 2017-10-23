@extends('layouts.invoicemaster')
@section('title')
@endsection
@section('content')
<div class="container">
    <div id="invoiceholder">

  <div id="invoice">
    
    <div id="invoice-top">
      <div class="info">
        <h2><strong>Michael Truong</strong></h2>
        <p> hello@michaeltruong.ca<br>
            +8801965238949
        </p>
      </div><!--End Info-->
      <div class="title text-right">
        <h2><strong>Invoice #{{$invoice->id}}</strong></h2>
        <p>Issued: {{$invoice->date}}</p>
      </div><!--End Title-->
    </div><!--End InvoiceTop-->
    
    <div id="invoice-bot">
      
      <div id="table">
        <table>
          <tr class="text-center">
            <td class="text-left"><h2><strong>Product Name</strong></h2></td>
            <td class="text-left"><h2><strong>Quantity</strong></h2></td>
            <td class="text-left"><h2><strong>Price</strong></h2></td>
            <td class="text-left"><h2><strong>Sub-total</strong></h2></td>
          </tr>
          @foreach($invoices as $product)
          <tr class="service">
            <td class="tableitem"><p style="margin-top: -15px;" class="itemtext"></p>{{$product->name}}</td>
            <td class="tableitem"><p class="itemtext">{{$product->qty}}</p></td>
            <td class="tableitem"><p class="itemtext">${{$product->price}}</p></td>
            <td class="tableitem"><p class="itemtext">${{$product->amount}}</p></td>
          </tr>
          @endforeach
        </table>
      </div><!--End Table-->
      <div class="invoice-footer text-right">
            <h2><strong>Vat</strong>: ${{$invoice->vat}}</h2>
            <h2><strong>Discount</strong>: ${{$invoice->discount}}</h2>
            <h2><strong>Total</strong>: ${{$invoice->total_price}}</h2>
      </div>

      <div class="add-info">
        <h2><strong>Additional Information</strong></h2>
        <hr>
        <p><strong>You can change your products within 7 days.</strong></p>
      </div>
      
    </div><!--End InvoiceBot-->
  <button type="button" class="btn btn-lg btn-primary" id="printButton">Print</button>
  </div><!--End Invoice-->
</div><!-- End Invoice Holder-->
</div>
@endsection